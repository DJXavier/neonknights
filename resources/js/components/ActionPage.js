import React from 'react';
import ReactDOM from 'react-dom';
import SimpleAction from './ActionCards/SimpleAction';
import SelectionTable from './SelectionTable';

class ActionPage extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            actions: [],
            pointsUsed: 0
        }
        this.actionPoints = 3;
        this.handleAction = this.handleAction.bind(this);
        this.handleSelectAction = this.handleSelectAction.bind(this);
    }

    actionEntry(type, value, targetId, entryData) {
        if ((this.state.pointsUsed + value) <= this.actionPoints) {
            let newAction = {
                questName: type,
                length: value,
                joustAccepted: this.joustAcceptance(),
                targetId: targetId,
                entryData: entryData,
                time: 'start',
            };

            let actions = this.state.actions;
            actions.push(newAction);

            let newPointsUsed = this.state.pointsUsed + value;
            this.setState({
                actions: actions,
                pointsUsed: newPointsUsed
            }, () => console.log(this.state.actions));
        } else {
            alert("You have used up your action slots for the week. Please remove ones you don't want.");
        }
    }

    handleAction(type, value) {
        if ((this.state.pointsUsed + value) <= this.actionPoints) {
            this.actionEntry(type, value, null, null);
        } else {
            alert("You have used up your action slots for the week. Please remove ones you don't want.");
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
            case "jousting":
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
            alert("Please eneter all actions for your week before submitting your actions.");
        }
    }

    render() {
        return (
            <div className="container-xl">
                <div className="row justify-content-center">
                    {/*Display game name*/}
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
                                            name={"Jousting"}
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
                        <table className="col-md-12">
                            <tbody>
                                <tr>
                                    <td>
                                        <div className="card">
                                            <div className="card-header" style={{textAlign: "center", fontWeight: "bold"}}>
                                                Currently Selected Actions
                                            </div>
                                            <div className="card-body ">
                                                <div id="displayPanel" className="form-group" style={{textAlign: "center"}}>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                            {/*Unknown php code*/}
                            
                            <div className="form-group row mb-0">
                                <div className="col-md-6 " style={{textAlign: "right"}}>
                                    <button type="submit" className="btn btn-primary">
                                        Confirm
                                    </button>
                                </div>
                                <div className="col-md-6 " style={{textAlign: "left"}}>
                                    <input value="Reset" type="button" className="btn btn-primary" onClick={() => window.location.reload()}>
                                        
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
    ReactDOM.render(<ActionPage gameId={gameId} knightId={knightId}/>, document.getElementById('action-page'));
}
