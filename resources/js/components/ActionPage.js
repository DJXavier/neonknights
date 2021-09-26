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

    handleAction(type, secret, value) {
        if ((this.state.pointsUsed + value) <= this.actionPoints) {
            let newAction = {
                questName: type,
            };

            let actions = this.state.actions;
            actions.push(newAction);

            let newPointsUsed = this.state.pointsUsed + value;
            this.setState({
                actions: actions,
                pointsUsed: newPointsUsed
            }, () => console.log(this.state.actions));
            //Add elements
        } else {
            alert("Fail");
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
        
        if (((this.state.pointsUsed + value) <= this.actionPoints)
            && (action !== "not available")
            && (selectedItem != false)) {
            let newAction = {
                questName: action,
                targetId: selectedItem
            };

            let actions = this.state.actions;
            actions.push(newAction);

            let newPointsUsed = this.state.pointsUsed + value;
            this.setState({
                actions: actions,
                pointsUsed: newPointsUsed
            }, () => console.log(this.state.actions));
        } else {
            alert("Fail");
        }
    }

    render() {
        return (
            <div className="container-xl">
                <div className="row justify-content-center">
                    {/*Display game name*/}
                    <div className="col-md-12">
                        <form action="/submittedweeklyaction/{{ $id }}" method="POST" onSubmit={() => { event.preventDefault(); FormSubmit(event) }}>
                        {/*CSRF token required*/}
                        {/*Error display*/}
                        <table className="col-md-12">
                            <tbody>
                                <tr>
                                    {SimpleAction('Quest', 3, (type, secret, value) => this.handleAction(type, secret, value))}
                                    {SimpleAction('Party', 1, (type, secret, value) => this.handleAction(type, secret, value))}
                                    {SimpleAction('Train', 1, (type, secret, value) => this.handleAction(type, secret, value))}
                                    {SimpleAction('Slack Off', 1, (type, secret, value) => this.handleAction(type, secret, value))}
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
                                                    <label htmlFor="type" className="form-control-plaintext text-md" style={{textAlign: "center"}} >takes 2 time slots</label>
                                                </div>
                                        
                                                <textarea className="form-control" style={{width: "100%"}} rows = "4"></textarea>

                                                <div className="form-group row mb-0">
                                                    <div className="col-md-12 " style={{textAlign: "center"}}>
                                                        <input value="add" id="poem" name="poem" type="button" className="btn btn-primary" onClick={() => AddActionClickListener('poem','poemButton',2)}>
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
                                                    <input type="radio" id="joustAccept" name="joustAccept" className= "col-md-1" style={{textAlign: "left"}} onClick={() => toggleOnJoust()}>
                                                        
                                                    </input>
                                                    <label>Agree</label>
                                                    <input type="radio" id="joustAccept" name="joustAccept" className= "col-md-1" style={{textAlign: "left"}} onClick={() => toggleOffJoust()} defaultChecked>
                                                                        
                                                    </input>
                                                    <label>Decline</label>
                                                    <input value="no" type="hidden" id="joustAcceptButton" name="joustAcceptButton">
                                                        
                                                    </input>
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
