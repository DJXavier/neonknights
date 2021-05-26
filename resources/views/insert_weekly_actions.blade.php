@extends('layouts.app')

<style>
    body {
        background-color: #dbdbdb;
    }
    .row
    {
        clear: both;
        display: flex;
        width: 1000px;
    }
    .action
    {
        padding-top: 10px;
        padding-bottom: 10px;
        float: left;
        flex: 1;
        border:1px solid black;
        background-color: white;
        overflow: hidden;
        text-align: center;
    }
    .label
    {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        display: block; 
    }
    textarea
    {
        resize: none;
    }
    .button_add
    {
        float: left;
        margin-left: 15px;
        border:1px solid navy;
    }
    .button_add:hover {
        background-color: navy;
        color: white;
    }
    .button_form_complete
    {
        border: 1px solid green;
    }
    .button_form_complete:hover
    {
        background-color: green;
        color: white;
    }
    .button_form_reset
    {
        border: 1px solid red;
    }
    .button_form_reset:hover {
        background-color: red;
        color: white;
    }
    .writing
    {
        margin-top: 15px;
        margin-bottom: 15px;
        height: 150px;
        width: 95%;
        margin-left: 2.5%;
    }
    table, th, td {
        border: 1px solid black;
    }
    table {
        margin-top: 15px;
        margin-bottom: 15px;
        width: 90%;
        margin-left: 5%;
        border-collapse: collapse;
    }
    .pageContent {
        padding-left: 30px;
    }
</style>
<title>Insert Weekly Actions</title>

@section('content')

    <div class="pageContent">
        <h1>[Group Name]</h1>
        <h2>[Character Name]</h2>
        <div class="Row">
            <div class="Action">
                <button class="button_add">Add</button>
                <div class="label">Quest (3 Slots)</div>
            </div>
            <div class="Action">
                <button class="button_add">Add</button>
                <div class="label">Party (1 Slot)</div>
            </div>
            <div class="Action">
                <button class="button_add">Add</button>
                <div class="label">Train (1 Slot)</div>
            </div>
            <div class="Action">
                <button class="button_add">Add</button>
                <div class="label">Slack off (1 Slot)</div>
            </div>
        </div>
        <div class="Row">
            <div class="Action">
                <button class="button_add">Add</button>
                <div class="label">Write Poem/Song (2 Slots)</div>
                <form>
                <textarea class="writing" placeholder="Write your poem/song"></textarea>
                </form>
            </div>
        </div>
        <div class="Row">
            <div class="Action">
                <button class="button_add">Add</button>
                <div class="label">Flirt (1 Slot)</div>
                <form>
                <table>
                    <tr>
                        <th>Select</th>
                        <th>Noblebots</th>
                        <th>Level</th>
                    </tr>
                    <tr>
                        <td>
                            <div class="radio">
                                <label><input type="radio" name="optradio"></label>
                            </div>
                        </td>
                        <td>Dame Micromilila Self-tunington</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="radio">
                                <label><input type="radio" name="optradio"></label>
                            </div>
                        </td>
                        <td>Lady Globaldus of Phase-loopingland</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="radio">
                                <label><input type="radio" name="optradio"></label>
                            </div>
                        </td>
                        <td>Dame Exception Decodingster</td>
                        <td>4</td>
                    </tr>
                </table>
                </form>
            </div>
            <div class="Action">
                <button class="button_add">Add</button>
                <div class="label">Jousting (1 Slot)</div>
                <table>
                    <tr>
                        <th>Select</th>
                        <th>Noblebots</th>
                        <th>Level</th>
                    </tr>
                    <tr>
                        <td>
                            <div class="radio">
                                <label><input type="radio" name="optradio"></label>
                            </div>
                        </td>
                        <td>Knight One</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="radio">
                                <label><input type="radio" name="optradio"></label>
                            </div>
                        </td>
                        <td>Knight Two</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="radio">
                                <label><input type="radio" name="optradio"></label>
                            </div>
                        </td>
                        <td>Knight Three</td>
                        <td>2</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="Row">
            <div class="Action">
                <h2>Will you accept Jousts (Drink/Fight)?</h2>
                <form>
                    <label class="radio-inline">
                        <input type="radio" name="optradio" checked>Accept
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="optradio">Declines
                    </label>
                </form>
            </div>
        </div>
        <div class="Row">
            <div class="Action">
                <button class="button_form_complete">Complete</button>
                <button class="button_form_reset">Reset</button>
            </div>
        </div>
    </div>

@endsection