import axios from 'axios';
import GroupEmailSize from './GroupEmailSize.js';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class GroupEmailEntry extends Component {
    constructor(props){
        super(props);
        this.state = {
            groupSize: 4,
        }

        this.groupSizeHandler = this.groupSizeHandler.bind(this);
    }

    groupSizeHandler() {
        let newSize = document.getElementById('playersSelect').value;
        this.setState({
            groupSize: newSize,
        })
    }
    
    render() {
        let emails = [];

        for (let i = 1; i <= (this.state.groupSize); i++) {
            let emailName = "email" + i;
            emails.push(
                <div className="form-group row" key={emailName}>
                    <label type="text" className="col-md-4 col-form-label text-md-right">{"Email " + i}</label>
                    <div className="col-md-6">
                        <input type="text" className="form-control" name={emailName} />
                    </div>
                </div>
            )
        }

        return (
            <React.Fragment>
                <div className="form-group row">
                    <label htmlFor="name" className="col-md-4 col-form-label text-md-right">Group Name</label>

                    <div className="col-md-6">
                        <input id="name" type="text" className="form-control" name="name" required autofocus></input>
                    </div>
                </div>

                <div className="form-group row">
                    <GroupEmailSize labelName="Max Players" groupSizeHandler={() => this.groupSizeHandler()} value={this.state.groupSize}/>
                </div>

                {emails}

                <div className="form-group row">
                    <label className="col-md-4 col-form-label text-md-right">Game Type</label>

                    <div className="col-md-6 form-check-inline">
                        <div className="form-check-inline">
                            <input type="radio" className="form-check-input" name="gameType" id="arcade" value="arcade" />
                            <label htmlFor="arcade" className="form-check-label">Arcade</label>
                        </div>
                        <div className="form-check-inline">
                            <input type="radio" className="form-check-input" name="gameType" id="campaign" value="campaign" defaultChecked />
                            <label htmlFor="campaign" className="form-check-label">Campaign</label>
                        </div>
                    </div>
                </div>
                <div className="form-group row mb-0">
                    <div className="col-md-8 offset-md-4">
                        <button type="submit" className="btn btn-primary">
                            Create Game
                        </button>
                    </div>
                </div>
            </React.Fragment>
        );
    }
}

if(document.getElementById('groupForm')) {
    document.getElementById('groupForm').addEventListener('submit', (e) => {
        e.preventDefault();
        let formInfo = new FormData(e.target);
        axios.post('/api/apigame', formInfo)
            .then(response => console.log(response))
            .catch(error => console.log(error.response.data));
    });
}

if (document.getElementById('groupEmail')) {
    let entryElement = document.getElementById('groupEmail');
    ReactDOM.render(<GroupEmailEntry />, entryElement)
}