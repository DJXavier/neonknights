import ReactDOM from 'react-dom';
import { useRef, useState } from 'react';
import { useDrag, useDrop } from 'react-dnd'
import { ItemTypes } from './Const';
import Modal from 'react-modal';
import SelectionTable from '../SelectionTable';

const style = {
    border: '1px dashed gray',
    padding: '0.5rem 1rem',
    marginBottom: '.5rem',
    backgroundColor: 'white',
    cursor: 'move',
};

function handleDisplayAction(type, index, value, gameId, knightId, handleEdit) {
    let view = null;
    switch(type) {
        case "poem":
            view = <div id="modal-text-edit">
                <textarea className="form-control" id="poem-area-edit" style={{width: "100%"}} rows = "4" defaultValue={value}></textarea>
                <div className="form-group row mb-0">
                    <div className="col-md-12 " style={{textAlign: "center"}}>
                        <button className="btn btn-primary" onClick={() => handleEdit(index, type, document.getElementById("poem-area-edit").value)}>Update</button>
                    </div>
                </div>
            </div>
            break;
        case "joust":
            view = <SelectionTable
                name={"Joust"}
                itemName={"Knight"}
                length={1}
                index={index}
                initialSelected = {value}
                handleEdit={handleEdit}
                getRoute={"/game/joust/" + gameId + "/" + knightId}
            />
            break;
        case "flirt":
            view = <SelectionTable
                name={"Flirt"}
                itemName={"Noblebot"}
                length={1}
                index={index}
                initialSelected = {value}
                handleEdit={handleEdit}
                getRoute={"/noblebot/" + gameId}
            />
            break;
    }

    return view;
};

function Action({ id, text, index, time, entryData, targetId, gameId, knightId, moveCard, handleEdit, handleDelete}) {
    const ref = useRef(null);
    const [{ handlerId }, drop] = useDrop({
        accept: ItemTypes.ACTION,
        collect(monitor) {
            return {
                handlerId: monitor.getHandlerId(),
            };
        },
        hover(item, monitor) {
            if (!ref.current) {
                return;
            }
            const dragIndex = item.index;
            const hoverIndex = index;
            // Don't replace items with themselves
            if (dragIndex === hoverIndex) {
                return;
            }
            // Determine rectangle on screen
            const hoverBoundingRect = ref.current?.getBoundingClientRect();
            // Get vertical middle
            const hoverMiddleY = (hoverBoundingRect.bottom - hoverBoundingRect.top) / 2;
            // Determine mouse position
            const clientOffset = monitor.getClientOffset();
            // Get pixels to the top
            const hoverClientY = clientOffset.y - hoverBoundingRect.top;
            // Only perform the move when the mouse has crossed half of the items height
            // When dragging downwards, only move when the cursor is below 50%
            // When dragging upwards, only move when the cursor is above 50%
            // Dragging downwards
            if (dragIndex < hoverIndex && hoverClientY < hoverMiddleY) {
                return;
            }
            // Dragging upwards
            if (dragIndex > hoverIndex && hoverClientY > hoverMiddleY) {
                return;
            }
            // Time to actually perform the action
            moveCard(dragIndex, hoverIndex);
            // Note: we're mutating the monitor item here!
            // Generally it's better to avoid mutations,
            // but it's good here for the sake of performance
            // to avoid expensive index searches.
            item.index = hoverIndex;
        },
    });
    
    const [{ isDragging }, drag] = useDrag({
        type: ItemTypes.ACTION,
        item: () => {
            return { id, index };
        },
        collect: (monitor) => ({
            isDragging: monitor.isDragging(),
        }),
    });

    const opacity = isDragging ? 0.5 : 1;

    drag(drop(ref));

    let placedText = (
        time.charAt(0).toUpperCase() + time.slice(1) + " of the week: "
        + text.charAt(0).toUpperCase() + text.slice(1)
    );

    let value = null;
    switch(text) {
        case "poem":
            value = entryData;
            break;
        case "joust":
        case "flirt":
            value = targetId;
            break;
    }
    
    const [isOpen, setIsOpen] = useState(false);

    const setIsOpenTrue = () => {
        setIsOpen(true)
    }

    const setIsOpenFalse = () => {
        setIsOpen(false)
    }

    return (<div ref={ref} style={{ ...style, opacity }} className="row justify-content-between" data-handler-id={handlerId}>
            <div className="col-sm-4">
                <p>{placedText}</p>
            </div>
            <div id="ActionModal">
            <button className="btn btn-info float-right" onClick={setIsOpenTrue}>Edit</button>
                <Modal 
                    isOpen={isOpen}
                    onRequestClose={setIsOpenFalse}
                    preventScroll={true}
                    style={{
                        overlay: {
                            position: 'fixed',
                            top: '0',
                            left: '0',
                            right: '0',
                            bottom: '0',
                            backgroundColor: 'rgba(0, 0, 0, 0.75)',
                        },
                        content: {
                            position: 'fixed',
                            top: '50%',
                            left: '50%',
                            transform: 'translate(-50%, -50%)',
                            border: '1px solid #ccc',
                            background: '#fff',
                            overflow: 'auto',
                            borderRadius: '4px',
                            outline: 'none',
                            padding: '20px',
                        }
                    }}
                    appElement={document.getElementById('app')}
                >
                    <button className="close" onClick={setIsOpenFalse}>X</button>
                    <h1>Edit Action</h1>
                    {handleDisplayAction(text, index, value, gameId, knightId, handleEdit)}
                </Modal>
            </div>
            <button className="btn btn-danger float-right" onClick={() => handleDelete(index)}>Delete</button>
		</div>);
}

export default Action;