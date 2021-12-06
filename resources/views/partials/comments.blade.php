<div class="tablet">
    <div class="tablet__head tablet__head__color-brand">
        <div class="tablet__head-label">
            <h3 class="tablet__head-title text-white" style="font-size: 16px!important; font-weight:bold;">{{$subject->title}}</h3>
        </div>
    </div>
    <div class="tablet__body tablet__tigthen" style="font-size: 14px!important; ">
        <p style="font-size: 12px!important; max-width:300px!important;">  {!! $subject->description . ''!!}</p>
    </div>
    <div class="tablet__footer" style="font-size: 13px!important;">
        <p class="smalltext" style="font-size: 13px!important;">{{ __('Created at') }}:
            {{date('l, d/m/y H:i:s', strtotime($subject->created_at))}}
            @if($subject->updated_at != $subject->created_at)
                <br/>{{ __('Modified') }}: {{date('l, d/m/y H:i:s', strtotime($subject->updated_at))}}    
            @endif</p>

    </div>
</div>

<?php $count = 0;?>
<?php $i = 1 ?>
{!! Form::open(array('url' => $subject->getCreateCommentEndpoint())) !!}
    <div class="form-group">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'comment-field']) !!}
        {!! Form::submit( __('Add Comment') , ['class' => 'btn btn-brand btn-md btn-upper movedown']) !!}
    </div>
    {!! Form::close() !!}
@foreach($subject->comments->sortByDesc('created_at') as $comment)
    <div class="tablet tablet__shadow" style="font-size: 14px!important;">
        <div class="tablet__body tablet__tigthen" style="font-size: 14px!important;">
            <p style="font-size: 12px!important;">  {!! $comment->description !!} </p>
        </div>
        <div class="tablet__footer tablet__tigthen" style="font-size: 12px!important;">
            <p class="smalltext" style="font-size: 14px!important;">{{ __('Comment by') }}: {{$comment->user->name}} 
            </p>
            <p class="smalltext" style="font-size: 14px!important;">{{ __('Created at') }}:
                {{date('l, d/m/y H:i:s', strtotime($comment->created_at))}}
                @if($comment->updated_at != $comment->created_at)
                    <br/>{{ __('Modified') }} : {{date(carbonFullDateWithText(), strtotime($comment->updated_at))}}
                @endif</p>
        </div>
    </div>

@endforeach
<br/>
    

@push('scripts')
    <script>

        $(document).ready(function() {
            $('#comment-field').summernote({
                toolbar: [
                    [ 'fontsize', [ 'fontsize' ] ],
                    [ 'font', [ 'bold', 'italic', 'underline','clear'] ],
                    [ 'color', [ 'color' ] ],
                    [ 'para', [ 'ol', 'ul', 'paragraph'] ],
                    [ 'table', [ 'table' ] ],
                    [ 'insert', [ 'link', 'picture'] ],
                    [ 'view', [ 'fullscreen' ] ]
                ],
                height:300,
                disableDragAndDrop: false,
                maximumImageFileSize: 1000*1024,
                fontSize:12,
                acceptedFiles: "image/*,application/pdf, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.openxmlformats-officedocument.spreadsheetml.template, application/vnd.openxmlformats-officedocument.presentationml.template, application/vnd.openxmlformats-officedocument.presentationml.slideshow, application/vnd.openxmlformats-officedocument.presentationml.presentation, application/vnd.openxmlformats-officedocument.presentationml.slide, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.openxmlformats-officedocument.wordprocessingml.template, application/vnd.ms-excel.addin.macroEnabled.12, application/vnd.ms-excel.sheet.binary.macroEnabled.12,text/rtf,text/plain,audio/*,video/*,.csv,.doc,.xls,.ppt,application/vnd.ms-powerpoint,.pptx, .pdf",

            });

            $('.note-editable').atwho({
                at: "@",
                limit: 5,
                delay: 400,
                callbacks: {
                    remoteFilter: function (t, e) {
                        t.length <= 2 || $.getJSON("/users/users", {q: t}, function (t) {
                            e(t)
                        })
                    }
                }
            })

        });
    </script>
@endpush
