import axios from 'axios';
import React from 'react';
import ReactDOM from 'react-dom';

class SelectionTable extends React.Component {
    constructor(props) {
        super(props);
        this.idPrefix = this.props.itemName.toLowerCase();
        this.itemTitle = (this.props.itemName + "s");
        this.state = {
            initialSelected: '',
            selectable: [],
        }
    }

    componentDidMount() {
        this.setState({initialSelected: this.props.initialSelected});

        let getPath = (
            window.location.origin + '/api'
            + this.props.getRoute
        );
        axios.get(getPath)
            .then((res) => {
                this.setState({selectable: res.data[this.itemTitle.toLowerCase()]})
            })
            .catch((err) => console.log(err));
    }

    findSelection() {
        let selectableNumber = this.state.selectable.length;

        let selectablePos = -1;

        for (let i = 0; i < selectableNumber; i++) {
            let idToCheck = (this.idPrefix + i);

            if (typeof this.state.initialSelected !== 'undefined' && this.state.initialSelected !== null) {
                idToCheck += "-edit";
            }

            let radioToCheck = document.getElementById(idToCheck);
            if (radioToCheck.checked) {
                selectablePos = i
            }
        }

        if (selectablePos < 0) {
            return false;
        } else {
            return this.state.selectable[selectablePos]._id;
        }
    }

    checkInitialSelected(index, inputId) {
        if (typeof inputId !== 'undefined' || inputId !== null) {
            let opponents = this.state.selectable;
            if (opponents[index]._id === this.state.initialSelected) {
                return true;
            }
        } else {
            return false;
        }
    }

    setTableID(initialSelected)
    {
        let id = "joust-table";

        if (typeof initialSelected !== 'undefined' && initialSelected !== null) {
            id = "joust-table-edit";
        }
        
        return id;
    }

    setButtonID(initialSelected, inputId)
    {
        let id = inputId;

        if (typeof initialSelected !== 'undefined' && initialSelected !== null) {
            id += "-edit";
        }
        
        return id;
    }

    displayButton(initialSelected) {
        if (typeof initialSelected === 'undefined' || initialSelected === null) {
            return <div className="form-group row mb-0">
                <div className="col-md-12 " style={{textAlign: "center"}}>
                    <input value="add" id="joust" name="joust" type="button" className="btn btn-primary"
                        onClick={() => this.props.handleSelectAction(
                            this.props.name.toLowerCase(),
                            this.props.length,
                            this.findSelection()
                            )}>
                    </input>
                </div>
            </div>
        }
    }

    displayButtonEdit(initialSelected) {
        if (typeof initialSelected !== 'undefined' && initialSelected !== null) {
            return <div className="form-group row mb-0">
                <div className="col-md-12 " style={{textAlign: "center"}}>
                    <input value="edit" id="joust" name="joust" type="button" className="btn btn-primary"
                        onClick={() => this.props.handleEdit(
                            this.props.index,
                            this.props.name.toLowerCase(),
                            this.findSelection()
                            )}>
                    </input>
                </div>
            </div>
        }
    }

    render() {
        let rows = [];
        let opponents = this.state.selectable;
        for(let i = 0; i < opponents.length; i++) {
            let inputId = (this.idPrefix + i);
            rows.push(
                <tr key={opponents[i].name}>
                    <td><input type="radio" name={this.idPrefix + "Choice"} id={this.setButtonID(this.state.initialSelected, inputId)} defaultChecked={this.checkInitialSelected(i, inputId)}></input></td>
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
                        {this.props.name}
                    </div>
                    <div className="card-body">
                        
                        <div className="form-group row">    
                            <label htmlFor="type" className="form-control-plaintext text-md" style={{textAlign: "center"}}>Takes {this.props.length} time slot</label>
                        </div>
            
                        <table id={this.setTableID(this.state.initialSelected)} className="table-bordered col-md-12">
                            <thead>
                                <tr>
                                    <th>
                                        Select
                                    </th>
                                    
                                    <th>
                                        {this.itemTitle}
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

                        {this.displayButton(this.state.initialSelected)}
                        {this.displayButtonEdit(this.state.initialSelected)}
                    </div>
                </div>
            </div>
        );
    };
}

export default SelectionTable;