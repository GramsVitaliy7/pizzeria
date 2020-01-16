@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="success-operation alert alert-success" style="display:none;">
            </div>
            <div class="error-operation alert alert-warning" style="display:none;">
            </div>
            <div class="form-send-message">

                <div class="row justify-content-md-center">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="message_text">Name:</label><br>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="message_text">Email:</label><br>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="message_text">Message:</label><br>
                            <textarea class="form-group" id="message_text" rows="5" cols="33"
                                      name="text"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                        <a href="#" data-url="{{ route('messages.store') }}" class="btn-send-message btn btn-primary">Send</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/send_message.js"></script>
@endsection
