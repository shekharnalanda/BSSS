<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\CommitteeController;
use App\Http\Controllers\Admin\LeadershipMessageController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\MembershipTypeController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InstitutionController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\MembershipApplicationController;
use App\Http\Controllers\MemberVerificationController;
use App\Http\Controllers\Admin\MembershipApplicationController as AdminMembershipApplicationController;
use App\Http\Controllers\PublicSiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicSiteController::class, 'home'])->name('home');
Route::view('/about', 'about')->name('about');
Route::get('/institutions', [PublicSiteController::class, 'institutions'])->name('institutions');
Route::view('/programs', 'programs')->name('programs');
Route::get('/news-events', [PublicSiteController::class, 'news'])->name('news-events');
Route::get('/gallery', [PublicSiteController::class, 'gallery'])->name('gallery');
Route::get('/downloads', [PublicSiteController::class, 'downloads'])->name('downloads');
Route::view('/career', 'career')->name('career');
Route::view('/contact', 'contact')->name('contact');
Route::post('/enquiry', [EnquiryController::class, 'store'])->middleware('throttle:10,1')->name('enquiry.store');
Route::get('/member/verify/{membershipNumber}', [MemberVerificationController::class, 'show'])
    ->where('membershipNumber', '[A-Za-z0-9\-]+')
    ->name('member.verify');

Route::get('/membership/apply', [MembershipApplicationController::class, 'create'])->name('membership.apply');
Route::post('/membership/apply', [MembershipApplicationController::class, 'store'])->middleware('throttle:5,1')->name('membership.store');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.submit');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/institutions', [InstitutionController::class, 'index'])->name('institutions.index');
        Route::post('/institutions', [InstitutionController::class, 'store'])->name('institutions.store');
        Route::put('/institutions/{institution}', [InstitutionController::class, 'update'])->name('institutions.update');
        Route::delete('/institutions/{institution}', [InstitutionController::class, 'destroy'])->name('institutions.destroy');

        Route::get('/news', [ContentController::class, 'news'])->name('news.index');
        Route::post('/news', [ContentController::class, 'storeNews'])->name('news.store');
        Route::put('/news/{newsPost}', [ContentController::class, 'updateNews'])->name('news.update');
        Route::delete('/news/{newsPost}', [ContentController::class, 'deleteNews'])->name('news.destroy');

        Route::get('/gallery', [ContentController::class, 'gallery'])->name('gallery.index');
        Route::post('/gallery', [ContentController::class, 'storeGallery'])->name('gallery.store');
        Route::put('/gallery/{galleryItem}', [ContentController::class, 'updateGallery'])->name('gallery.update');
        Route::delete('/gallery/{galleryItem}', [ContentController::class, 'deleteGallery'])->name('gallery.destroy');

        Route::get('/downloads', [ContentController::class, 'downloads'])->name('downloads.index');
        Route::post('/downloads', [ContentController::class, 'storeDownload'])->name('downloads.store');
        Route::put('/downloads/{download}', [ContentController::class, 'updateDownload'])->name('downloads.update');
        Route::delete('/downloads/{download}', [ContentController::class, 'deleteDownload'])->name('downloads.destroy');

        Route::get('/enquiries', [ContentController::class, 'enquiries'])->name('enquiries.index');
        Route::patch('/enquiries/{enquiry}', [ContentController::class, 'updateEnquiry'])->name('enquiries.update');
        Route::delete('/enquiries/{enquiry}', [ContentController::class, 'deleteEnquiry'])->name('enquiries.destroy');

        Route::get('/committees', [CommitteeController::class, 'index'])->name('committees.index');
        Route::post('/committees', [CommitteeController::class, 'store'])->name('committees.store');
        Route::put('/committees/{committee}', [CommitteeController::class, 'update'])->name('committees.update');
        Route::delete('/committees/{committee}', [CommitteeController::class, 'destroy'])->name('committees.destroy');

        Route::post('/committees/{committee}/members', [CommitteeController::class, 'storeMember'])->name('committee-members.store');
        Route::put('/committee-members/{member}', [CommitteeController::class, 'updateMember'])->name('committee-members.update');
        Route::delete('/committee-members/{member}', [CommitteeController::class, 'destroyMember'])->name('committee-members.destroy');

        Route::get('/leadership-messages', [LeadershipMessageController::class, 'index'])->name('leadership.index');
        Route::post('/leadership-messages', [LeadershipMessageController::class, 'store'])->name('leadership.store');
        Route::put('/leadership-messages/{leadershipMessage}', [LeadershipMessageController::class, 'update'])->name('leadership.update');
        Route::delete('/leadership-messages/{leadershipMessage}', [LeadershipMessageController::class, 'destroy'])->name('leadership.destroy');

        Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
        Route::post('/programs', [ProgramController::class, 'store'])->name('programs.store');
        Route::put('/programs/{program}', [ProgramController::class, 'update'])->name('programs.update');
        Route::delete('/programs/{program}', [ProgramController::class, 'destroy'])->name('programs.destroy');

        Route::get('/memberships', [MembershipTypeController::class, 'index'])->name('memberships.index');
        Route::post('/memberships', [MembershipTypeController::class, 'store'])->name('memberships.store');
        Route::put('/memberships/{membershipType}', [MembershipTypeController::class, 'update'])->name('memberships.update');
        Route::delete('/memberships/{membershipType}', [MembershipTypeController::class, 'destroy'])->name('memberships.destroy');

        Route::get('/membership-applications', [AdminMembershipApplicationController::class, 'index'])->name('membership-applications.index');
        Route::patch('/membership-applications/{membershipApplication}', [AdminMembershipApplicationController::class, 'update'])->name('membership-applications.update');
        Route::delete('/membership-applications/{membershipApplication}', [AdminMembershipApplicationController::class, 'destroy'])->name('membership-applications.destroy');

        Route::get('/members', [MemberController::class, 'index'])->name('members.index');
        Route::put('/members/{member}', [MemberController::class, 'update'])->name('members.update');
        Route::get('/members/{member}/card', [MemberController::class, 'card'])->name('members.card');
        Route::get('/members/{member}/certificate', [MemberController::class, 'certificate'])->name('members.certificate');

        Route::get('/settings', [ContentController::class, 'settings'])->name('settings.index');
        Route::put('/settings', [ContentController::class, 'saveSettings'])->name('settings.update');
    });
});
