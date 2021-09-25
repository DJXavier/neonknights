import React from 'react';
import ReactDOM from 'react-dom';

class ActionPage extends React.Component {
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
                                    <td className="col-md-3" style={{padding: "0px"}}>
                                        <div className="card">
                                            <div className="card-header" style={{textAlign: "center", fontWeight: "bold"}}>
                                                Quest
                                            </div>
                                            <div className="card-body">
                                                <div className="form-group row">    
                                                    <label htmlFor="type" className="form-control-plaintext text-md" style={{textAlign: "center"}}>takes 3 time slots</label>
                                                </div>
                                                <div className="form-group row mb-0">
                                                    <div className="col-md-6 offset-md-4">
                                                        <input  value="add" id="quest" name="quest" type="button" className="btn btn-primary" onClick={() => AddActionClickListener('quest','questButton',3)}>
                                                        </input>  
                                                        <input value="" type="hidden" id="questButton" name="questButton">

                                                        </input>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>    
                                    <td className="col-md-3"  style={{padding: "0px"}}>
                                        <div className="card">
                                            <div className="card-header" style={{textAlign: "center", fontWeight: "bold"}}>
                                                Party

                                            </div>
                                            <div className="card-body">
                                                <div className="form-group row">    
                                                    <label htmlFor="type" className="form-control-plaintext text-md" style={{textAlign: "center"}} >takes 1 time slots</label>
                                                </div>
                                                <div className="form-group row mb-0">
                                                    <div className="col-md-6 offset-md-4">
                                                        <input value="add" id="party" name="party" type="button" className="btn btn-primary" onClick={() => AddActionClickListener('party','partyButton',1)}>
                                                        </input>

                                                        <input value="" type="hidden" id="partyButton" name="partyButton">
                                                    
                                                        </input>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>  
                                    <td className="col-md-3"  style={{padding: "0px"}}>
                                        <div className="card">
                                            <div className="card-header" style={{textAlign: "center", fontWeight: "bold"}}>
                                                Train
                                            </div>
                                            <div className="card-body">
                                                <div className="form-group row">    
                                                    <label htmlFor="type" className="form-control-plaintext text-md" style={{textAlign: "center"}} >takes 1 time slots</label>
                                                </div>
                                                <div className="form-group row mb-0">
                                                    <div className="col-md-6 offset-md-4">
                                                        <input value="add" id="train" name="train" type="button" className="btn btn-primary" onClick={() => AddActionClickListener('train','trainButton',1)}>
                                                        </input>

                                                        <input value="" type="hidden" id="trainButton" name="trainButton">
                                                    
                                                        </input>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>  
                                    <td className="col-md-3"  style={{padding: "0px"}}>
                                        <div className="card">
                                            <div className="card-header" style={{textAlign: "center", fontWeight: "bold"}}>
                                                Slack off
                                            </div>
                                            <div className="card-body">
                                                <div className="form-group row">    
                                                    <label htmlFor="type" className="form-control-plaintext text-md" style={{textAlign: "center"}} >takes 1 time slots</label>
                                                </div>
                                                <div className="form-group row mb-0">
                                                    <div className="col-md-6 offset-md-4">
                                                        <input value="add" id="slackOff" name="slackOff" type="button" className="btn btn-primary" onClick={() => AddActionClickListener('slackOff','slackOffButton',1)}>
                                                        </input>

                                                        <input value="" type="hidden" id="slackOffButton" name="slackOffButton">
                                                    
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
                                    <td className="col-md-6" style={{padding: "0px"}}>
                                        <div className="card ">
                                            <div className="card-header" style={{textAlign: "center", fontWeight: "bold"}}>
                                                Flirt
                                            </div>
                                                
                                            <div className="card-body">
                                                <div className="form-group row">    
                                                    <label htmlFor="type" className="form-control-plaintext text-md" style={{textAlign: "center"}} >takes 1 time slot</label>
                                                </div>
                                    
                                                <table className="table-bordered col-md-12">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                Select
                                                                
                                                            </th>
                                                            
                                                            <th>
                                                                Noblebots
                                                                
                                                            </th>
                                                            <th>
                                                                Level
                                                                
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="radio" name="flirtChoice">
                                                                    
                                                                </input>
                                                            </td>
                                                            <td>
                                                                Noblebots No.89757
                                                            </td>
                                                            <td>
                                                                4
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="radio" name="flirtChoice">
                                                                    
                                                                </input>
                                                            </td>
                                                            <td>
                                                                Noblebots No.101
                                                            </td>
                                                            <td>
                                                                5
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="radio" name="flirtChoice">
                                                                    
                                                                </input>
                                                            </td>
                                                            <td>
                                                                
                                                                Noblebots No.7768
                                                            </td>
                                                            <td>
                                                                3
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                <div className="form-group row mb-0">
                                                    <div className="col-md-12 " style={{textAlign: "center"}}>
                                                        <input value="add" id="flirt" name="flirt" type="button" className="btn btn-primary" onClick={() => AddActionClickListener('flirt','flirtButton',1)}>
                                                        </input>

                                                        <input value="" type="hidden" id="flirtButton" name="flirtButton">
                                                    
                                                        </input>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                {/*Display Knights*/}
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
    ReactDOM.render(<ActionPage />, document.getElementById('action-page'));
}
