import axios from 'axios';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class GroupEmailEntry extends Component {
    constructor(props){
        super(props);
        this.state = {
        }
    }

    render() {
        
    }
}

if (document.getElementById('invitationList')) {
    let entryElement = document.getElementById('invitationList');
    ReactDOM.render(<GroupEmailEntry />, entryElement)
}
