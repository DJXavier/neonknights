import React, { Component } from "react";
import ReactDOM from "react-dom";
import dice from "../1.png";
class Test extends Component {
    render() {
        return (
            <div>
                <h1>Cool, it's working</h1>
                <img src={dice} />
            </div>
        );
    }
}

export default Test;

// We only want to try to render our component on pages that have a div with an ID
// of "example"; otherwise, we will see an error in our console
if (document.getElementById("test")) {
    ReactDOM.render(<Test />, document.getElementById("test"));
}
