import React from "react";
import ReactDOM from "react-dom";

function Dice() {
    const firstDieImage = require("./resources/photos/1.png");
    const secondDieImage = require("./resources/photos/2.png");

    return (
        <div className="Dice">
            <header className="Dice-header">
                <div style={{ display: "flex", margin: 20 }}>
                    <img src={firstDieImage} className="die" alt="Die one" />
                    <img src={secondDieImage} className="die" alt="Die two" />
                </div>
                <span>8</span>
                <button className="button">Roll</button>
            </header>
        </div>
    );
}

export default Dice;

if (document.getElementById("dice")) {
    ReactDOM.render(<Dice />, document.getElementById("dice"));
}
