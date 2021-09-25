import axios from 'axios';
import React from 'react';
import ReactDOM from 'react-dom';

class KnightJoust extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            knights: [],
            noblebots: [],
        }
    }

    componentDidMount() {
        let getPath = (
            window.location.origin
            + '/api/game/joust/' + this.props.gameId
            + '/' + this.props.knightId
        );
        axios.get(getPath)
            .then((res) => this.setState({knights: res.data.knights}))
            .catch((err) => console.log(err));
    }

    render() {
        let rows = [];
        let opponents = this.state.knights;
        for(let i = 0; i < opponents.length; i++) {
            rows.push(
                <tr key={opponents[i].name}>
                    <td><input type="radio" name="knightChoice"></input></td>
                    <td>
                        {opponents[i].name}
                    </td>
                    <td>
                        {opponents[i].level}
                    </td>
                </tr>
            );
        }
        return(
            <div>
                <div className="card">
                    <div className="card-header" style={{textAlign: "center", fontWeight: "bold"}}>
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
                                        Knight
                                    </th>
                                    <th>
                                        Level
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                {rows}
                            </tbody>
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
    let gameId = document.getElementById('game-id').value;
    let knightId = document.getElementById('knight-id').value;
    ReactDOM.render(<KnightJoust gameId={gameId} knightId={knightId}/>, document.getElementById('knight-joust'));
}
