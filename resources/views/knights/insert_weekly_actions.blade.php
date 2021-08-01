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
    textarea
    {
        resize: none;
    }
    .writing
    {
        margin-top: 15px;
        margin-bottom: 15px;
        height: 150px;
        width: 98%;
        resize: none;
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
        <form class="container">
            <h1>[Group Name]</h1>
            <h2>[Character Name]</h2>
            <div class="row">
                <div class="form-group action">
                    <button class="btn btn-primary float-left ml-2" onclick="">Add</button>
                    <label class="my-2">Quest (3 Slots)</label>
                </div>
                <div class="form-group action">
                    <button class="btn btn-primary float-left ml-2" onclick="">Add</button>
                    <label class="my-2">Party (1 Slot)</label>
                </div>
                <div class="form-group action">
                    <button class="btn btn-primary float-left ml-2" onclick="">Add</button>
                    <label class="my-2">Train (1 Slot)</label>
                </div>
                <div class="form-group action">
                    <button class="btn btn-primary float-left ml-2" onclick="">Add</button>
                    <label class="my-2">Slack off (1 Slot)</label>
                </div>
            </div>
            <div class="row">
                <div class="form-group action">
                    <button class="btn btn-primary float-left ml-2" onclick="">Add</button>
                    <label class="my-2">Write Poem/Song (2 Slots)</label>
                    <textarea class="writing" placeholder="Write your poem/song here"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group action">
                    <button class="btn btn-primary float-left ml-2" onclick="">Add</button>
                    <label class="my-2">Flirt (1 Slot)</label>
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
                </div>
                <div class="form-group action">
                    <button class="btn btn-primary float-left ml-2" onclick="">Add</button>
                    <label class="my-2">Jousting (1 Slot)</label>
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
            <div class="row">
                <div class="form-group action">
                    <h2>Will you accept Jousts (Drink/Fight)?</h2>
                        <label class="radio-inline mr-2">
                            <input type="radio" name="optradio" checked>Accept
                        </label>
                        <label class="radio-inline ml-2">
                            <input type="radio" name="optradio">Decline
                        </label>
                </div>
            </div>
            <div class="row">
                <div class="form-group action">
                    <button class="btn btn-success">Complete</button>
                    <button class="btn btn-danger">Reset</button>
                </div>
            </div>
        </form>
    </div>

@endsection