<?php

use App\Models\ConferenceDetail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\TaxiBookingController;
use App\Http\Controllers\NeetDomicileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SchoolMemberController;
use App\Http\Controllers\VideoGalleryController;
use App\Http\Controllers\MissionVisionController;
use App\Http\Controllers\SchoolContactController;
use App\Http\Controllers\SubpageBannerController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\ChairmanMessageController;
use App\Http\Controllers\ContactUsMasterController;
use App\Http\Controllers\ConferenceDetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth', 'role:superadmin'])->group(function () {

    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
    // Route::resource('school-members', SchoolMemberController::class);
    Route::get('school-members', [SchoolMemberController::class, 'create'])->name('school-members.create');
    Route::get('school-members/index', [SchoolMemberController::class, 'index'])->name('school-members.index');
    Route::post('school-members', [SchoolMemberController::class, 'store'])->name('school-members.store');
    Route::get('school-members/edit/{id}', [SchoolMemberController::class, 'edit'])->name('school-members.edit');
    Route::put('school-members/update/{id}', [SchoolMemberController::class, 'update'])->name('school-members.update');
    Route::delete('school-members/destroy/{id}', [SchoolMemberController::class, 'destroy'])->name('school-members.destroy');

    Route::resource('news', NewsController::class);

    Route::get('subpage_banners/create', [SubpageBannerController::class, 'create'])->name('subpage_banners.create');
    Route::get('subpage_banners/index', [SubpageBannerController::class, 'index'])->name('subpage_banners.index');
    Route::post('subpage_banners/create', [SubpageBannerController::class, 'store'])->name('subpage_banners.store');
    Route::get('subpage_banners/edit/{id}', [SubpageBannerController::class, 'edit'])->name('subpage_banners.edit');
    Route::put('subpage_banners/update/{id}', [SubpageBannerController::class, 'update'])->name('subpage_banners.update');
    Route::delete('subpage_banners/destroy/{id}', [SubpageBannerController::class, 'destroy'])->name('subpage_banners.destroy');

    Route::get('galleries/index', [GalleryController::class, 'index'])->name('galleries.index');
    Route::get('galleries/create', [GalleryController::class, 'create'])->name('galleries.create');
    Route::post('galleries/create', [GalleryController::class, 'store'])->name('galleries.store.submit');
    Route::get('galleries/{id}/edit', [GalleryController::class, 'edit'])->name('galleries.edit');
    Route::put('galleries/{id}', [GalleryController::class, 'update'])->name('galleries.update');
    Route::delete('galleries/{id}', [GalleryController::class, 'destroy'])->name('galleries.destroy');
    Route::delete('galleries/image/{id}', [GalleryController::class, 'deleteImage'])->name('galleries.deleteImage');

    Route::get('chairman-messages/create', [ChairmanMessageController::class, 'create'])->name('chairman-messages.create');
    Route::get('chairman-messages/index', [ChairmanMessageController::class, 'index'])->name('chairman-messages.index');
    Route::post('chairman-messages/create', [ChairmanMessageController::class, 'store'])->name('chairman-messages.store');
    Route::get('chairman-messages/edit/{id}', [ChairmanMessageController::class, 'edit'])->name('chairman-messages.edit');
    Route::put('chairman-messages/update/{id}', [ChairmanMessageController::class, 'update'])->name('chairman-messages.update');
    Route::delete('chairman-messages/destroy/{id}', [ChairmanMessageController::class, 'destroy'])->name('chairman-messages.destroy');

    Route::resource('mission-vision', MissionVisionController::class);
    Route::get('mission-vision/index', [MissionVisionController::class, 'index'])->name('mission-vision.index');

    Route::resource('neet-domiciles', NeetDomicileController::class);

    Route::resource('video-gallery', VideoGalleryController::class);
    Route::get('video-gallery/index', [MissionVisionController::class, 'index'])->name('video-gallery.index');

    // Route::resource('results-master', ResultController::class);

    Route::get('results-master/index', [ResultController::class, 'show'])->name('results-master.index');
    Route::get('results-master/create', [ResultController::class, 'create'])->name('results-master.create');
    Route::post('sgallerie/create', [ResultController::class, 'store'])->name('results-master.store');
    Route::get('results-master/{id}/edit', [ResultController::class, 'edit'])->name('results-master.edit');
    Route::put('results-master/{id}', [ResultController::class, 'update'])->name('results-master.update');
    Route::delete('results-master/{id}', [ResultController::class, 'destroy'])->name('results-master.destroy');

    Route::get('/results/{slug}', [ResultController::class, 'showBySlug'])
        ->name('results.slug');

    // Route::resource('admin/category', CategoryController::class);

    Route::get('admin/category/index', [CategoryController::class, 'show'])->name('admin.category.index');
    Route::get('admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('sgallerie/create', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('admin/category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('admin/category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    Route::get('/conferences/create', [ConferenceController::class, 'create'])->name('conferences.create');
    Route::post('/conferences/create', [ConferenceController::class, 'store'])->name('conferences.store');
    Route::get('/conferences/index', [ConferenceController::class, 'index'])->name('conferences.index');
    Route::delete('/conferences/{slug}', [ConferenceController::class, 'destroy'])->name('conferences.destroy');

    Route::get('/conferences_detail/create', [ConferenceDetailController::class, 'create'])->name('conferences_detail.create');
    Route::post('/conferences_detail/create', [ConferenceDetailController::class, 'store'])->name('conferences_detail.store');
    Route::get('/conferences_detail/index', [ConferenceDetailController::class, 'index'])->name('conferences_detail.index');
    Route::delete('/conferences_detail/{slug}', [ConferenceDetailController::class, 'destroy'])->name('conferences_detail.destroy');

    Route::get('events/index', [EventController::class, 'show'])->name('events.index');
    Route::get('events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('events/create', [EventController::class, 'store'])->name('events.store');
    Route::get('events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

    Route::get('contactUs-master/create', [ContactUsMasterController::class, 'create'])
    ->name('contactUs-master.create');

    Route::post('contactUs-master/store', [ContactUsMasterController::class, 'store'])
    ->name('contactUs-master.store');

    Route::get('contactUs-master/index', [ContactUsMasterController::class, 'index'])
    ->name('contactUs-master.index');

    Route::get('contactUs-master/edit/{id}', [ContactUsMasterController::class, 'edit'])
    ->name('contactUs-master.edit');

    Route::put('contactUs-master/update/{id}', [ContactUsMasterController::class, 'update'])
    ->name('contactUs-master.update');

    Route::delete('contactUs-master/destroy/{id}', [ContactUsMasterController::class, 'destroy'])
    ->name('contactUs-master.destroy');

});
Route::get('/conferences-show', [ConferenceController::class, 'showMethod'])->name('conferences-show');
Route::get('/show-page/{slug}', [ConferenceDetailController::class, 'showConfDetail'])->name('show-page');

Route::get('all-events', [HomeController::class, 'allEvents'])->name('pages.all-events');

Route::get('student', [StudentController::class, 'create'])->name('pages.mbbs-neet-mentor');
Route::post('student', [StudentController::class, 'store'])->name('pages.mbbs-neet-mentor.store');

Route::middleware('role:superadmin')->group(function () {
    Route::resource('schools-master', SchoolController::class)->parameters([
        'schools-master' => 'school'
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('profile', [UserController::class, 'profile'])
        ->name('auth.profile');

    Route::put('profile', [UserController::class, 'profileUpdate'])
        ->name('auth.profile.update');

    Route::resource('banner', BannerController::class);
    Route::resource('about-page', AboutController::class)->parameters([
        'about-page' => 'about'
    ]);

 Route::resource('roles', RoleController::class)->only(['edit','update']);

});


Route::get('register/{slug}', [RegistrationController::class, 'showForm'])
    ->name('registration.form');
Route::post('register', [RegistrationController::class, 'submitForm'])->name('registration.submit');
Route::get('/result-page', [HomeController::class, 'resultPage'])->name('pages.result-page');


Route::get('/pages/detail-page/{id}', [SchoolController::class, 'detailPage'])->name('pages.detail-page');
Route::get('/pages/{slug}', [SchoolController::class, 'show'])->name('pages.show');

Route::get('/event-detail/{id}', [HomeController::class, 'eventDetailPage'])->name('pages.event-detail-page');


Route::post('/school/{slug}/contact', [SchoolContactController::class, 'store'])->name('school.contact.store');
Route::get('/mission-vision', [HomeController::class, 'missionVision'])->name('pages.mission-vision');
Route::get('/our-philosophy', [HomeController::class, 'ourPhilosophy'])->name('pages.our-philosophy');
Route::get('/values-built-on-belief', [HomeController::class, 'valuesBuiltonBelief'])->name('pages.values-built-on-belief');
Route::get('/faculty-page', [HomeController::class, 'faculty'])->name('pages.faculty-page');
Route::get('/neet-domicile-page/{slug}', [HomeController::class, 'neetDomicilePage'])->name('pages.neet-domicile-page');

Route::get('/prospectus', [HomeController::class, 'prosPectus'])->name('pages.prospectus');

Route::get('/video-gallery', [HomeController::class, 'videoGallery'])->name('pages.video-gallery');
Route::get('/chairmans-message', [HomeController::class, 'chairmansMsg'])->name('pages.chairmans-message');

Route::get('/taxi-booking', [TaxiBookingController::class, 'index'])->name('pages.taxi-booking');
Route::post('/taxi-booking', [TaxiBookingController::class, 'store'])->name('pages.taxi-booking.store');

Route::get('/news-list', [HomeController::class, 'news'])->name('pages.news-list');
Route::get('/facility', [HomeController::class, 'facilities'])->name('pages.facility');
Route::get('/all-courses', action: [HomeController::class, 'allcourses'])->name('pages.courses');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('pages.contact-us');
Route::get('/news-details/{id}', [HomeController::class, 'newsDetails'])->name('pages.news-details');
Route::get('/aicu', [HomeController::class, 'aicu'])->name('pages.aicu');


Route::get('/', [HomeController::class, 'home'])->name('pages.home');
Route::get('about-us', [HomeController::class, 'about'])->name('pages.about-us');
Route::get('gallery-list', [HomeController::class, 'gallery'])->name('pages.gallery-page');
Route::get('gallery-details/{id}', [HomeController::class, 'galleryDetail'])->name('pages.gallery-details');

Route::get('pages/course-detail/{id}', [HomeController::class, 'coursDetail'])->name('pages.course-detail');
Route::get('contact', [HomeController::class, 'contact'])->name('pages.contact');

Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users/create', [UserController::class, 'store'])->name('users.store');
Route::get('users/index', [UserController::class, 'index'])->name('users.index');
Route::delete('users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('login', [UserController::class, 'login'])->name('auth.login');
Route::post('login', [UserController::class, 'loginPost'])->name('auth.store');
Route::get('logout', [UserController::class, 'logout'])->name('auth.logout');

Route::resource('course-categories', CourseCategoryController::class);
Route::resource('courses-master', CourseController::class)->parameters([
    'courses-master' => 'course'
]);

Route::get('terms-and-condition', [HomeController::class, 'termsandcondition'])->name('pages.terms-and-condition');
Route::get('privacy-policy', [HomeController::class, 'privacypolicy'])->name('pages.privacy-policy');


Route::post('/contact-us/submit', [ContactUsMasterController::class, 'submitContactForm'])->name('contact.us.submit');
