function SimpleAction(name, length, handleAction) {
    return (
        <td className="col-md-3" style={{padding: "0px"}}>
            <div className="card">
                <div className="card-header" style={{textAlign: "center", fontWeight: "bold"}}>
                    {name}
                </div>
                <div className="card-body">
                    <div className="form-group row">    
                        <label htmlFor="type" className="form-control-plaintext text-md" style={{textAlign: "center"}}>Takes {length} time slots</label>
                    </div>
                    <div className="form-group row mb-0">
                        <div className="col-md-6 offset-md-4">
                            <input  value="add" id="quest" name="quest" type="button" className="btn btn-primary" onClick={() => handleAction(name.toLowerCase(), name.toLowerCase() + 'Button', length)}></input>  
                            <input value="" type="hidden" id="questButton" name="questButton"></input>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    );
}

export default SimpleAction;
