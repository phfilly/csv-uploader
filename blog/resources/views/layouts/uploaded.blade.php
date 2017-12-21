@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class='col-md-10 col-md-offset-1'>
            <div class="panel panel-default">
                <div class="panel-heading">Upload your documents here</div>

                <div class="panel-body">
                    @if (isset($action))
                      <div class="alert alert-success" role="alert">{{ $action }}</div>
                    @endif
                    <form action="/upload" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload CSV</label>
                            <input type="file" name="csv-file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div> <!-- panel body -->

                <div>
                    @if (isset($data))
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    @foreach ($headings as $heading)
                                        <th>{{ $heading }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $entry)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $entry[0] }}  </td>
                                    <td> {{ $entry[1] }}  </td>
                                    <td> {{ $entry[2] }}  </td>
                                    <td> {{ $entry[3] }}  </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div> <!-- panel -->
        </div> <!-- col -->
    </div><!-- row -->
</div>

@endsection