<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\About;
use App\Models\Banner;
use App\Models\Course;
use App\Models\Result;
use App\Models\Gallery;
use App\Models\NeetDomicile;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Models\MissionVision;
use App\Models\SubpageBanner;
use App\Models\CourseCategory;
use App\Models\ChairmanMessage;
use App\Models\Conference;
use App\Models\ContactUsMaster;
use App\Models\Event;

class HomeController extends Controller
{
    public function home()
    {
        $categories = CourseCategory::with('courses')->get();
        //  dd($categories);
        $news = News::orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        $allcourses = Course::where('course_status', 'active')->get();
        //  dd($allcourses);
        $events = Event::limit(3)->get();
        $banners = Banner::all();

        $conferences = Conference::limit(3)->get();
        return view('pages.home', compact('categories', 'allcourses', 'banners', 'news', 'events', 'conferences'));
    }

    public function coursDetail() {}

    public function about()
    {
        $about =  About::first();
        $page = SubpageBanner::where('id', 2)->first();
        return view('pages.about-us', compact('about', 'page'));
    }

    public function contactUs()
    {
        $page = SubpageBanner::where('id', 4)->first();
         $contactUs = ContactUsMaster::latest()->first(); 

      $contact = ContactUsMaster::first(); // contains whatsapp_no
    //   dd($contact);
        return view('pages.contact-us', compact('page', 'contactUs', 'contact'));
    }

    public function dashboard()
    {
        $user = auth()->user();
        return view('admin.dashboard', compact('user'));
    }

    public function news()
    {
        $news = News::latest()->paginate(10);
        $page = SubpageBanner::where('id', 7)->first();
        return view('pages.news-list', compact('news', 'page'));
    }

    public function newsDetails($id)
    {
        $newsDetails = News::find($id);

        $otherNews = News::where('id', '!=', $id)
            ->orderBy('created_at', 'desc')
            ->take(5) // limit to 5, adjust as needed
            ->get();
        $page = SubpageBanner::where('id', 13)->first();
        return view('pages.news-details', compact('newsDetails', 'otherNews', 'page'));
    }

    public function allcourses()
    {
        $courses = Course::latest()->paginate(10);
        $page = SubpageBanner::where('id', 8)->first();
        return view('pages.courses', compact('courses', 'page'));
    }

    public function gallery()
    {
        $galleries = Gallery::with('images')->latest()->paginate(9);
        $page = SubpageBanner::where('id', 9)->first();
        return view('pages.gallery-page', compact('galleries', 'page'));
    }

    public function galleryDetail($id)
    {
        $gallery = Gallery::with('images')->findOrFail($id);
        $page = SubpageBanner::where('id', 10)->first();
        return view('pages.gallery-details', compact('gallery', 'page'));
    }

    public function facilities()
    {
        $page = SubpageBanner::where('id', 11)->first();
        return view('pages.facility', compact('page'));
    }

    // public function missionVision()
    // {
    //     $missions = MissionVision::where('type', 'mission')->get();
    //     $visions = MissionVision::where('type', 'vision')->get();
    //     $objectives = MissionVision::where('type', 'objective')->get();
    //     $page = SubpageBanner::where('id', 15)->first();
    //     return view('pages.mission-vision', compact('missions', 'visions', 'objectives', 'page'));
    // }

    public function missionVision()
    {
        $missions = MissionVision::with('media')->where('type', 'mission')->get();
        $visions  = MissionVision::with('media')->where('type', 'vision')->get();
        $objectives = MissionVision::with('media')->where('type', 'objective')->get();
        $page = SubpageBanner::where('id', 15)->first();

        return view('pages.mission-vision', compact('missions','visions','objectives', 'page'));
    }


    public function ourPhilosophy(){
         $page = SubpageBanner::where('id', 16)->first();
        return view('pages.our-philosophy', compact('page'));
    }

    public function valuesBuiltonBelief(){
           $page = SubpageBanner::where('id', 17)->first();
        return view('pages.values-built-on-belief', compact('page'));
    }

     public function faculty(){
           $page = SubpageBanner::where('id', 18)->first();
        return view('pages.faculty-page', compact('page'));
    }

    public function chairmansMsg(){
         $getAllData = ChairmanMessage::with('items')->first();
            $page = SubpageBanner::where('id', 19)->first();
        return view('pages.chairmans-message', compact('getAllData', 'page'));
    }

    public function neetDomicilePage($slug){
     $state = NeetDomicile::where('slug', $slug)->firstOrFail();
      $page = SubpageBanner::where('id', 20)->first();
        return view('pages.neet-domicile-page', compact('state', 'page'));
    }

    public function aicu(){
             $page = SubpageBanner::where('id', 21)->first();
        return view('pages.aicu', compact('page'));
    }

    public function videoGallery(){
        $videoGalleries = VideoGallery::paginate(10);
          $page = SubpageBanner::where('id', 22)->first();
        return view('pages.video-gallery', compact('videoGalleries','page'));
    }

    public function prosPectus(){
        $page = SubpageBanner::where('id', 24)->first();
        return view('pages.prospectus', compact('page'));
    }

    public function resultPage(){
    $results = Result::orderBy('id', 'DESC')->paginate(12);
            $page = SubpageBanner::where('id', 24)->first();
        return view('pages.result-page', compact('results', 'page'));
    }

    public function allEvents(){
        $allEvents = Event::paginate(10);
        $page = SubpageBanner::where('id', 28)->first();
        return view('pages.all-events', compact('allEvents', 'page'));
    }

    public function eventDetailPage($id){
        $eventDetail = Event::find($id);
         $page = SubpageBanner::where('id', 29)->first();
        $otherEvents = Event::where('id', '!=', $id)
                        ->orderBy('event_date', 'desc')
                        ->take(4)
                        ->get();
        return view('pages.event-detail-page', compact('eventDetail', 'page', 'otherEvents'));
    }

    public function termsandcondition(){
        return view('pages.terms-and-condition');
    }

    public function privacypolicy(){
        return view('pages.privacy-policy');
    }
}
