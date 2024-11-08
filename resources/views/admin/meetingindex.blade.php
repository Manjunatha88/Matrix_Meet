<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Meet</title>
    <link rel="stylesheet" href="../meetingassets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../meetingassets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
    <script src="../meetingassets/js/jquery-3.4.1.min.js"></script>
    <script src="../meetingssets/js/app.js"></script>
    <script>

     $(function() {
    const urlParams = new URLSearchParams(window.location.search);
    var meeting_id = urlParams.get('meetingID');

    // Check if meeting_id is missing or invalid
    if (!meeting_id || meeting_id.trim() === "") {
        alert('Meeting ID is missing or invalid.');
        window.location.href = '/meetingaction';
        return;
    }

    var user_id = window.prompt('Enter your userid');

    // Loop to ensure a valid user ID is entered or the user cancels the prompt
    while (user_id === null || user_id.trim() === "") {
        if (user_id === null) { // User clicked 'Cancel'
            alert('You must enter a User ID to proceed.');
            window.location.href = '/meetingaction'; // Go to the previous page
            return;
        }
        alert('User ID cannot be empty. Please enter a valid User ID.');//suppose user id not give it show
        user_id = window.prompt('Enter your userid');
    }

    // Show the meeting container and initialize the app
    $("#meetingContainer").show();
    MyApp._init(user_id, meeting_id);

    // Show the user ID alert after joining the meeting
    alert('You have joined the meeting with User ID: ' + user_id);
});


    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <main class=" d-flex flex-column home-wrap">
        <div class="g-top text-light">
            <div class="top-remote-video-show-wrap d-flex">
                <div id="meetingContainer"  style="display: none;flex-basis: 75%;">
                <div class="call-wrap" style="background-color: black;">
                <div class="video-wrap" id="divUsers" style="display:flex; flex-wrap:wrap">
                    <div id="me" class="userbox display-center flex-column">
                        <h2 class="display-center" style="font-size: 14px;"></h2>
                        <!-- ......................HandRaise ...............-->
                        <div class="display-center" style="position: relative;">
                            <img class="handRaise" src="../meetingassets/images/handRaise.png" style="position: absolute;height: 30px;top:8%; left: 3%;display: none;"/>

                         <!-- .....................HandRaise .................-->   
                            <video autoplay muted id="locaVideoPlayer"></video>
                        </div>
                    </div>
                    <div id="otherTemplate" class="userbox display-center flex-column" style="display:none">
                        <h2 class="display-center" style="font-size: 14px;"></h2>
                        <!-- .....................HandRaise .................-->   
                        <div class="display-center" style="position: relative;">
                            <img src="../meetingassets/images/handRaise.png" style="position: absolute;height: 30px;top:8%; left: 3%;display: none;"/>
                            <!-- .....................HandRaise .................-->   
                            <video autoplay muted></video>
                            <audio autoplay controls style="display:none"></audio>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="g-right-details-wrap bg-light text-secondary h-100" style="flex-basis: 25%;  z-index: 1; display: none;">
                <div class="meeting-heading-wrap d-flex justify-content-between align-items-center pr-3 pl-3" style="height: 10vh;">
                    <div class="meeting-heading font-weight-bold ">Meeing Details</div>
                    <div class="meeting-heading-cross display-center cursor-pointer">
                        <span class="material-icons">clear</span>
                    </div>
                </div>
                <div class="people-chat-wrap d-flex justify-content-between align-items-center ml-3 mr-3 pr-3 pl-3" style="height: 10vh;font-size: 14px;">
                    <div class="people-heading display-center cursor-pointer">
                        <div class="people-headin-icon display-center mr-1">
                            <span class="material-icons">people</span>
                        </div>
                        <div class="people-headin-text display-center">
                            Participant  (<span class="participant-count">1</span>)
                        </div>
                    </div>
                    <div class="chat-heading d-flex just-content-round align-items-center cursor-pointer">
                        <div class="chat-heading-icon display-center mr-1">
                            <span class="material-icons">
                                message
                            </span>
                        </div>
                        <div class="chat-heading-text">
                            Chat
                        </div>
                    </div>
                </div>
                <div class="in-call-chat-wrap mr-3 ml-3 pl-3 pr-3" style="font-size: 14px; height: 69vh; overflow-y: scroll;">
                    <div class="in-call-wrap-up" style="display: none !important;">
                        <div class="in-call-wrap d-flex justify-content-between align-items-center mb-3">
                            <div class="participant-img-name-wrap display-center cursor-pointer">
                                <div class="participant-img">
                                    <img src="../meetingassets/images/other.jpg" alt="" class="border border-secondary" style="height: 40px;width: 40px;border-radius: 50%;">
                                </div>
                                <div class="participant-name ml-2">You</div>
                            </div>
                            <div class="participant-action-wrap display-center">
                                <div class="participant-action-dot display-center mr-2 cursor-pointer">
                                    <span class="material-icons">
                                        more_vert
                                    </span>
                                </div>
                                <div class="participant-action-pin display-center mr-2 cursor-pointer">
                                    <span class="material-icons">
                                        push_pin
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-show-wrap text-secondary  flex-column justify-content-between h-100" style="font-size: 14px; display: flex;">
                        <div class="chat-message-show" id="messages"></div>
                        <div class="chat-message-sent d-flex justify-content-between align-items-center" style="margin-bottom:35px">
                            <div class="chat-message-sent-input" style="width: 85%;">
                                <input type="text" name="" class="chat-message-sent-input-field w-100" id="msgbox" placeholder="Send a message to everyone" style="border-bottom: 1px solid teal; border: none;">
                            </div>
                            <div class="chat-message-sent-action display-center" id="btnsend" style="color: teal; cursor:pointer;">
                                <span class="material-icons">send</span>
                            </div>
                    </div>
                    </div>
                </div>

            </div>


            </div>
            <div class="g-top-left bg-light text-secondary w-25 d-flex align-items-center justify-content-between pl-2 pr-2">
                <div class="top-left-participant-wrap pt-2 cursor-pointer">
                    <div class="top-left-participant-icon">
                        <span class="material-icons">people</span>
                    </div>
                    <div class="top-left-participant-count participant-count">1</div>
                </div>
                <div class="top-left-chat-wrap pt-2 cursor-pointer">
                    <span class="material-icons">message</span>
                </div>
                <div class="top-left-time-wrap"></div>
            </div>
        </div>
        <div class="g-bottom bg-light m-0 d-flex justify-content-between align-items-center">
            <div class="bottom-left d-flex" style="height:10vh">
                <div class="g-details border border-success mb-2" style="display: none;min-height: 19.5vh;">
                    <div class="g-details-heading d-flex justify-content-between align-items-center border-bottom pb-1">
                        <div class="g-details-heading-detail d-flex align-items-center cursor-pointer">
                            <span class="material-icons">error</span style="margin-top:-5px">Details<span></span>
                        </div>
                        <div class="g-details-heading-attachment d-flex align-items-center cursor-pointer">
                            <span class="material-icons">attachment</span style="margin-top:-5px">Attachment<span></span>
                        </div>
                    </div>
                    <div class="g-details-heading-show-wrap">
                            <div class="g-details-heading-show">
                                <div style="font-weight: 600;color:gray">Joining Info</div>
                                <div class="meeting_url" style="padding: 5px 0;" data-toggle="tooltip" data-placement="top"></div>
                                <div style="cursor: pointer;">
                                    <span class="material-icons" style="font-size: 14px;">content_copy</span>
                                    <span class="copy_info font-weight-bold">Copy Joining Info <span style="display: none;background-color: aquamarine; border-radius: 5px;" class="link-conf font-weight-bold p-1">Link Copied</span></span>
                                </div>
                            </div>
                            <div class="g-details-heading-show-attachment" style="display: none;position: relative;">
                                <div class="show-attach-file"></div>
                                <div class="upload-attach-file">
                                    <form enctype="multipart/form-data" ref="uploadForm" class="display-center" id="uploadForm" style="justify-content: space-between;">
                                        <div class="custom-file" style="flex-basis:79%">
                                            <input type="file" class="custom-file-input" id="customFile" name="imagefile">
                                            <label for="customFile" class="custom-file-label">Choose File</label>
                                        </div>
                                        <div class="share-button-wrap">
                                            <button class="btn btn-primary btn-sm share-attach" style="flex-basis:19%;padding: 6px 20px;">Share</button>
                                        </div>
                                    </form>
                                </div>
                            
                            
                            </div>
                    </div>
                </div>
                 <div class="display-center cursor-pointer meeting-details-button">
                    Meeting Details<span class="material-icons">keyboard_arrow_down</span>
                </div>   
            </div>
            <div class="bottom-middle d-flex just-content-center align-items-center" style="height: 10vh;">

                <div class="mic-toggle-wrap action-icon-style display-center mr-2 cursor-pointer" id="miceMuteUnmute">
                    <span class="material-icons" style="width: 100%;">mic_off</span>
                </div>
                <div class="end-call-wrap action-icon-style display-center mr-2 cursor-pointer">
                    <span class="material-icons text-danger">call</span>
                </div>
                <div class="video-toggle-wrap action-icon-style display-center cursor-pointer" id="videoCamOnOff">
                    <span class="material-icons" style="width: 100%;">videocam_off</span>
                </div>
                <!-- .....................HandRaise .................-->   
                <div class="handRaiseAction display-center cursor-pointer" id="handRaiseAction" style="margin-left: 5px;">
                    <Img src="../meetingassets/images/handRaiseBlack.png" style="height: 30px;width: 30px;" />
                </div>
                <!-- .....................HandRaise .................-->   
            </div>
            <div class="bottom-right d-flex just-content-center align-items-center mr-3" id="screenShare-wrap" style="height: 10vh;">
                <div class="present-now-wrap d-flex just-content-center flex-column align-items-center mr-5 cursor-pointer" id="ScreenShareOnOf">
                    <span class="material-icons">present_to_all</span>
                    <div>Present Now</div>
                </div>
                
                <div class="option-wrap cursor-pointer display-center" style="height: 10vh; position:relative;">

                    <div class="recording-show">
                        <button class="btn btn-dark text-danger start-record">Start Recording</button>
                    </div>
                    <div class="option-icon">
                        <span class="material-icons">more_vert</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-box-show" style="display: none;">
            
        </div>
    </main>
    <div class="modal" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="confirmModalLabel">Join Request</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="confirmModalBody">
              <!-- This will be filled with the data from the server -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" id="denyButton">Deny</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal" id="allowButton">Allow</button>
            </div>
          </div>
        </div>
      </div>
</body>
</html>