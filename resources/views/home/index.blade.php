@extends('app')

@section('content')

     @unless ($infos->isEmpty())
         @foreach($infos as $info)
             <div class="flash-info" data-week="{{$info->week}}" id="info-{{$info->week}}">
                 <p>
                     {{ $info->content }}
                 </p>
             </div>
         @endforeach
     @endunless

     @unless ($lessons->isEmpty())
         <div id="timeline">
             <div class="timeline-guid">
                 @unless ($lessons->isEmpty())

                     @foreach($lessons as $lesson)
                         <button id="semaine-{{ $lesson->id }}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                             <a href="#article-s{{ $lesson->id }}"> Semaine {{ $lesson->name }}</a>
                         </button>
                     @endforeach

                 @endunless
             </div>
                 @foreach($lessons as $index => $lesson)
                   
                 @if ( $index % 2 == 0 )
                     <div class="article-wrapper" id="article-s{{ $lesson->id }}">
                 @else
                     <div class="article-wrapper odd" id="article-s{{ $lesson->id }}">
                 @endif

                     <div class="timeline-post article-date">
                         <p> {{ $lesson->name }} </p>
                         <span>{{ date('F d, Y', strtotime($lesson->created_at)) }}</span>
                     </div>
                     <article class="timeline-post">
                         <button class="timeline-post-button mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab">
                             <a href="/lessons/edit/{{ $lesson->id }}" title="edit">
                                 <i class="material-icons">add</i>
                             </a>
                         </button>
                         <h2>{{ $lesson->name }}</h2>
                         <label>Par {{ $lesson->user->name }}</label>
                         <div class="summary">
                             {{ $lesson->content }}
                         </div>
                         @if (Auth::user()->group->id != 1)
                            <div class="note-wrapper">
                                    @foreach($notes as $note)
                                        @if ($note->lesson_id == $lesson->id)
                                             <span class="note not">{{$note->value}}</span>
                                        @else
                                             <span class="note not">N/A</span>
                                        @endif
                                                                        
                                     @endforeach
    
                            </div>
                         @endif
                         <div class="doc-wrapper">

                         @unless ($lesson->medias->isEmpty())
                                 @foreach($lesson->medias as $media)
                                     <a href="/uploads/{{ $media->path }}" data-fancybox-type="iframe" class="doc-link lightbox">
                                         <i class="icon-doc"></i>
                                         {{ $media->name }}
                                     </a>
                                 @endforeach
                         @endunless

                         </div>


                     </article>
                 </div>
                 @endforeach

         </div>
     @endunless

@endsection




   

   