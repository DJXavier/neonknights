import React from 'react';
import ReactDOM from 'react-dom';

class KnightJoust extends React.Component {
    render() {
        return(
            <div>
                <div className="card">
                    <div className="card-header" style="text-align: center; font-weight: bold" style={{textAlign: "center", fontWeight: "bold"}}>
                        Jousting
                    </div>
                    <div className="card-body">
                        
                        <div className="form-group row">    
                            <label htmlFor="type" className="form-control-plaintext text-md" style={{textAlign: "center"}}>takes 1 time slot</label>
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
                                        <input type="radio" name="knightChoice">
                                            
                                        </input>
                                    </td>
                                    <td>
                                        Knight 1
                                    </td>
                                    <td>
                                        4
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="radio" name="knightChoice">
                                            
                                        </input>
                                    </td>
                                    <td>
                                        Knight 2
                                    </td>
                                    <td>
                                        3
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="radio" name="knightChoice">
                                            
                                        </input>
                                    </td>
                                    <td>
                                        Knight 3
                                    </td>
                                    <td>
                                        999
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <div className="form-group row mb-0">
                            <div className="col-md-12 " style={{textAlign: "center"}}>
                                <input value="add" id="joust" name="joust" type="button" className="btn btn-primary">
                                </input>

                                <input value="" type="hidden" id="joustButton" name="joustButton">
                            
                                </input>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        );
    };
}

export default KnightJoust;


if (document.getElementById('knight-joust')) {
    ReactDOM.render(<KnightJoust />, document.getElementById('knight-joust'));
}
