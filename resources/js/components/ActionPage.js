import React from 'react';
import { DndProvider } from 'react-dnd';
import { HTML5Backend } from 'react-dnd-html5-backend';
import ReactDOM from 'react-dom';
import ActionDnD from './ActionCards/ActionDnD';
import SimpleAction from './ActionCards/SimpleAction';
import SelectionTable from './SelectionTable';

const weekValues = [
    "Start",
    "Middle",
    "End"
]

class ActionPage extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            actions: [],
            pointsUsed: 0
        }
        this.actionPoints = 3;
        this.handleAction = this.handleAction.bind(this);
        this.handleTextAction = this.handleTextAction.bind(this);
        this.handleSelectAction = this.handleSelectAction.bind(this);
        this.handleDnDTime = this.handleDnDTime.bind(this);
    }

    actionEntry(type, value, targetId, entryData) {
        let currentPoints = this.state.pointsUsed;
        if ((currentPoints + value) <= this.actionPoints) {
            let time = weekValues[currentPoints].toLowerCase();
            let newAction = {
                id: (currentPoints + 1),
                questName: type,
                length: value,
                joustAccepted: this.joustAcceptance(),
                targetId: targetId,
                entryData: entryData,
                time: time,
            };

            let actions = this.state.actions;
            actions.push(newAction);

            let newPointsUsed = currentPoints + value;
            this.setState({
                actions: actions,
                pointsUsed: newPointsUsed
            });
        } else if (currentPoints === this.actionPoints) {
            alert("You have used up all your action slots for the week. Please remove ones you don't want.");
        } else {
            alert("You do not have enough available action slots for this action. Please remove ones you don't want.");
        }
    }

    handleDnDTime(actions) {
        let actionPoints = 0;
        for (let i = 0; i < actions.length; i++) {
            let time = weekValues[actionPoints].toLowerCase();
            actions[i].time = time;
            actionPoints += actions[i].length;
        }
        this.setState({actions: actions});
    }

    handleAction(type, value) {
        if ((this.state.pointsUsed + value) <= this.actionPoints) {
            this.actionEntry(type, value, null, null);
        } else if (this.state.pointsUsed === this.actionPoints) {
            alert("You have used up all your action slots for the week. Please remove ones you don't want.");
        } else {
            alert("You do not have enough available action slots for this action. Please remove ones you don't want.");
        }
    }

    handleTextAction(type, location, value) {
        let textArea = document.getElementById(location);

        if (textArea.value != null) {
            this.actionEntry(type, value, null, textArea.value);
        } else {
            alert("Please enter the information into the textbox before adding the action to your week.");
        }
    }

    handleSelectAction(type, value, selectedItem) {
        let action;
        switch(type) {
            case "joust":
                action = "joust";
                break;
            case "flirt":
                action = "flirt"
                break;
            default:
                action = "not available"
                break;
        }
        
        if ((action !== "not available") && (selectedItem != false)) {
            this.actionEntry(type, value, selectedItem, null);
        } else {
            alert("Please select an item before adding the action to your week.");
        }
    }

    handleReset() {
        this.setState({
            actions: [],
            pointsUsed: 0
        });
    }

    joustAcceptance() {
        let acceptButton = document.getElementById('joust-accept');
        if (acceptButton.checked) {
            return true;
        } else {
            return false;
        }
    }

    submitData() {
        if (this.state.pointsUsed === this.actionPoints) {
            for(let i = 0; i < this.state.actions.length; i++) {
                let submitPrefix = (
                    ((i+1) === 1) ? "one" : (
                        ((i+1) === 2) ? "two" : "three"
                    )
                );


                let action = this.state.actions[i];
                document.getElementById(submitPrefix + "-type").value = action.questName;
                document.getElementById(submitPrefix + "-length").value = action.length;
                document.getElementById(submitPrefix + "-joust-accept").value = action.joustAccepted;
                document.getElementById(submitPrefix + "-target").value = action.targetId;
                document.getElementById(submitPrefix + "-entry").value = action.entryData;
                document.getElementById(submitPrefix + "-time").value = action.time;
            }

            document.getElementById("action-post").submit();
        } else {
            alert("Please enter all actions for your week before submitting your actions.");
        }
    }

    render() {
        return (
            <div className="container-xl">
                <div className="row justify-content-center">
                    <div className="col-md-12"><h2>Action Entry for: {this.props.gameName}</h2></div>
                    <table className="col-md-12">
                        <tbody>
                            <tr>
                                <td>
                                    <div className="card">
                                        <div className="card-header" style={{textAlign: "center", fontWeight: "bold"}}>
                                            Currently Selected Actions
                                        </div>
                                        <div className="card-body">
                                            <h2>Action Slots Used: {this.state.pointsUsed} / {this.actionPoints}</h2>
                                            <DndProvider backend={HTML5Backend}>
                                                <ActionDnD actions={this.state.actions} handleDnDTime={(actions) => this.handleDnDTime(actions)}/>
                                            </DndProvider>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div className="col-md-12">
                        <form onSubmit={() => { event.preventDefault(); this.submitData() }}>
                        {/*CSRF token required*/}
                        {/*Error display*/}
                        <table className="col-md-12">
                            <tbody>
                                <tr>
                                    {SimpleAction('Quest', 3, (type, value) => this.handleAction(type, value))}
                                    {SimpleAction('Party', 1, (type, value) => this.handleAction(type, value))}
                                    {SimpleAction('Train', 1, (type, value) => this.handleAction(type, value))}
                                    {SimpleAction('Slack Off', 1, (type, value) => this.handleAction(type, value))}
                                </tr>
                            </tbody>
                        </table>
                        
                        <table className="col-md-12">
                            <tbody>
                                <tr>
                                    <td>
                                        <div className="card">
                                            <div className="card-header" style={{textAlign: "center", fontWeight: "bold"}}>
                                                Write Poem
                                            </div>
                                            <div className="card-body">
                                                
                                                <div className="form-group row">    
                                                    <label htmlFor="type" className="form-control-plaintext text-md" style={{textAlign: "center"}} >Takes 2 time slots</label>
                                                </div>
                                        
                                                <textarea className="form-control" id="poem-area" style={{width: "100%"}} rows = "4"></textarea>

                                                <div className="form-group row mb-0">
                                                    <div className="col-md-12 " style={{textAlign: "center"}}>
                                                        <input value="add" id="poem" name="poem" type="button" className="btn btn-primary" onClick={() => this.handleTextAction('poem','poem-area', 2)}>
                                                        </input>

                                                        <input value="" type="hidden" id="poemButton" name="poemButton">
                                                    
                                                        </input>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table className="col-md-12">
                            <tbody>
                                <tr>
                                    <td>
                                        <SelectionTable
                                            name={"Flirt"}
                                            itemName={"Noblebot"}
                                            length={1}
                                            handleSelectAction={this.handleSelectAction}
                                            getRoute={"/noblebot/" + this.props.gameId}
                                        />
                                    </td>
                                    <td>
                                        <SelectionTable
                                            name={"Joust"}
                                            itemName={"Knight"}
                                            length={1}
                                            handleSelectAction={this.handleSelectAction}
                                            getRoute={"/game/joust/" + this.props.gameId + "/" + this.props.knightId}
                                        />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                                
                        <table className="col-md-12">
                            <tbody>
                                <tr>
                                    <td>
                                        <div className="card">
                                            <div className="card-header" style={{textAlign: "center", fontWeight: "bold"}}>
                                                Will you accept jousts?
                                            </div>
                                            <div className="card-body ">
                                                <div className="form-group" style={{textAlign: "center"}}>
                                                    <input type="radio" id="joust-accept" name="joustAccept" className= "col-md-1" style={{textAlign: "left"}} onClick={() => toggleOnJoust()}></input>
                                                    <label>Agree</label>

                                                    <input type="radio" id="joust-decline" name="joustAccept" className= "col-md-1" style={{textAlign: "left"}} onClick={() => toggleOffJoust()} defaultChecked></input>
                                                    <label>Decline</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                            
                            <div className="form-group row mb-0">
                                <div className="col-md-6 " style={{textAlign: "right"}}>
                                    <button type="submit" className="btn btn-primary">
                                        Confirm
                                    </button>
                                </div>
                                <div className="col-md-6 " style={{textAlign: "left"}}>
                                    <input value="Reset" type="button" className="btn btn-primary" onClick={() => this.handleReset()}>
                                        
                                    </input>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        );
    }
}

export default ActionPage;

if (document.getElementById('action-page')) {
    let gameId = document.getElementById('game-id').value;
    let knightId = document.getElementById('knight-id').value;
    let gameName = document.getElementById('game-name').value;
    ReactDOM.render(<ActionPage gameId={gameId} gameName={gameName} knightId={knightId}/>, document.getElementById('action-page'));
}
