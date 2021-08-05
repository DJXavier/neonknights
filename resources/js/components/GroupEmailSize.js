import axios from 'axios';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class GroupEmailSize extends Component {
    render() {
        return(<React.Fragment>
            <label htmlFor="playersSelect" className="col-md-4 col-form-label text-md-right">{this.props.labelName}</label>
            <div className="col-md-6">
                <input type="range" min='4' max='12' defaultValue={this.props.value} onChange={this.props.groupSizeHandler} id="playersSelect" name="playersSelect" className="form-range"></input>
                <label id="groupSizeValue">{this.props.value}</label>
            </div>
            </React.Fragment>);
    }
}

export default GroupEmailSize;