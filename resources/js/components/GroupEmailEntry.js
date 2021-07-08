import { size } from 'lodash';
import React from 'react';
import ReactDOM from 'react-dom';

export default class GroupMailEntry extends React.Component {
    constructor(props){
        super(props);
        this.state = {
            groupSize: 4
        }
    }

    document.getElementById('players-select')

    mailFieldsDisplay = function() {
        for (i = 4; i <= this.state.groupSize; i++)
        {
            emailName = "email" + i;

            <div class="form-group row">
                <label for={emailName} class="col-md-4 col-form-label text-md-right">E-mail Address {i}</label>

                <div class="col-md-6">
                    <input id={emailName} type="email" class="form-control @error('email') is-invalid @enderror" name={emailName} value="{{ old('email') }}" required autocomplete="email"/>

                    @error('email{i}')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        }
    }
    
    render() {
        return (
            this.mailFieldsDisplay()
        );
    }
}

export default GroupEmailEntry;

if (document.getElementById('group-email-entry')) {
    ReactDOM.render(<GroupEmailEntry />, document.getElementById('group-email-entry'));
}
