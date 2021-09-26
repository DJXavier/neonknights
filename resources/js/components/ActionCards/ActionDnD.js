import { DndProvider, useDrop } from "react-dnd";
import { HTML5Backend } from 'react-dnd-html5-backend';
import React from "react";
import Action from "./Action";

class ActionDnD extends React.Component {
    constructor(props) {
        super(props);
        this.moveCard = this.moveCard.bind(this);
        this.state = {
            actions: [
                {
                    id: 1,
                    questName: 'Write a cool JS library',
                },
                {
                    id: 2,
                    questName: 'Make it generic enough',
                },
                {
                    id: 3,
                    questName: 'Write README',
                },
                {
                    id: 4,
                    questName: 'Create some examples',
                },
                {
                    id: 5,
                    questName: 'Spam in Twitter and IRC to promote it (note that this element is taller than the others)',
                },
                {
                    id: 6,
                    questName: '???',
                },
                {
                    id: 7,
                    questName: 'PROFIT',
                },
            ],
        }
    }

    moveCard(dragIndex, hoverIndex) {
        const dragCard = this.state.actions[dragIndex];
        let newArray = this.state.actions;
        newArray.splice(dragIndex, 1)
        newArray.splice(hoverIndex, 0, dragCard);
        this.setState({actions: newArray})
    }

    renderAction(action, index) {
        return <Action key={action.id} index={index} id={action.id} text={action.questName} moveCard={this.moveCard} />
    }

    render() {
        let toShow = ((this.state.actions != null)
            ? <div>{this.state.actions.map((action, i) => this.renderAction(action, i))}</div>
            : <div><h3>No actions have been selected yet.</h3></div>);
        return (
            <>
				{toShow}
			</>
        )
    }
}

export default ActionDnD;
