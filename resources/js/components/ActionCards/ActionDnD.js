import { DndProvider, useDrop } from "react-dnd";
import { HTML5Backend } from 'react-dnd-html5-backend';
import React from "react";
import Action from "./Action";

class ActionDnD extends React.Component {
    constructor(props) {
        super(props);
        this.moveCard = this.moveCard.bind(this);
    }

    moveCard(dragIndex, hoverIndex) {
        const dragCard = this.props.actions[dragIndex];
        let newArray = this.props.actions;
        newArray.splice(dragIndex, 1)
        newArray.splice(hoverIndex, 0, dragCard);
        this.setState({actions: newArray})
    }

    renderAction(action, index) {
        return <Action key={action.id} index={index} id={action.id} text={action.questName} moveCard={this.moveCard} />
    }

    render() {
        let toShow = ((this.props.actions != null)
            ? <div>{this.props.actions.map((action, i) => this.renderAction(action, i))}</div>
            : <div><h3>No actions have been selected yet.</h3></div>);
        return (
            <>
				{toShow}
			</>
        )
    }
}

export default ActionDnD;
