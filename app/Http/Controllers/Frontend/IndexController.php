<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Berita;
use App\Models\Events;
use App\Models\Footer;
use App\Models\ImageSlider;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use App\Models\ProfileSekolah;
use App\Models\User;
use App\Models\Video;
use App\Models\Visimisi;

class IndexController extends Controller
{
    //Welcome
    public function index()
    {
        // Gambar Slider
        $slider = ImageSlider::where('is_Active','0')->get();

        // About
        $about = About::where('is_Active','0')->first();

        // Video
        $video = Video::where('is_active','0')->first();

        // Berita
        $berita = Berita::where('is_active','0')->orderBy('created_at','desc')->get();

        // Event
        $event = Events::where('is_active','0')->orderBy('created_at','desc')->get();

        // Footer
        $footer = Footer::first();

        return view('frontend.welcome', compact('slider','about','video','berita','event','footer'));
    }

    // Berita
    public function berita()
    {

         // Footer
        $footer = Footer::first();
 
         // Kategori
         $kategori = KategoriBerita::where('is_active','0')->orderBy('created_at','desc')->get();
         
         // Berita
         $berita = Berita::where('is_active','0')->orderBy('created_at','desc')->paginate(10);
 
         return view('frontend.content.beritaAll', compact('berita','kategori','footer'));
    }
    // Show Detail Berita
    public function detailBerita($slug)
    {

        // Footer
        $footer = Footer::first();

        // Kategori
        $kategori = KategoriBerita::where('is_active','0')->orderBy('created_at','desc')->get();
        
        // Berita
        $beritaOther = Berita::where('is_active','0')->orderBy('created_at','desc')->get();

        $berita = Berita::where('slug',$slug)->first();
        return view('frontend.content.showBerita', compact('berita','kategori','beritaOther','footer'));
    }


    // Events
    public function events()
    {

         // Footer
        $footer = Footer::first();
 
         // Berita
         $berita = Berita::where('is_active','0')->orderBy('created_at','desc')->get();
 
         $event = Events::where('is_active','0')->orderBy('created_at','desc')->get();
         return view('frontend.content.event.eventAll', compact('event','berita','footer'));
    }


    // Detail Event
    public function detailEvent($slug)
    {

         // Footer
        $footer = Footer::first();
 
         // Berita
         $berita = Berita::where('is_active','0')->orderBy('created_at','desc')->get();
 
         $event = Events::where('slug',$slug)->first();
         $eventOther = Events::where('is_active','0')->orderBy('created_at','desc')->get();

         return view('frontend.content.event.detailEvent', compact('event','eventOther','berita','footer'));
    }

    // Profile Sekolah
    public function profileSekolah()
    {

        // Footer
        $footer = Footer::first();

        $profile = ProfileSekolah::first();
        return view('frontend.content.profileSekolah', compact('profile','footer'));
    }

    // Visi dan Misi
    public function visimisi()
    {

        // Footer
        $footer = Footer::first();

        $visimisi = Visimisi::first();
        return view('frontend.content.visimisi', compact('visimisi','footer'));
    }

}
