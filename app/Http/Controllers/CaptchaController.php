<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CaptchaController extends Controller
{
    public function showForm()
    {
        return view('captcha');
    }
    public function generate()
    {
        // Generate random captcha text
        $captcha = $this->generateCaptchaText();
        
        // Store in session for verification
        Session::put('captcha', $captcha);
        
        // Create image
        $image = $this->createCaptchaImage($captcha);
        
        return response($image)->header('Content-Type', 'image/png');
    }
    
    private function generateCaptchaText($length = 5)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $captcha = '';
        
        for ($i = 0; $i < $length; $i++) {
            $captcha .= $characters[rand(0, strlen($characters) - 1)];
        }
        
        return $captcha;
    }
    
    private function createCaptchaImage($text)
    {
        // Image dimensions
        $width = 130;
        $height = 40;
        
        // Create image
        $image = imagecreate($width, $height);
        
        // Colors
        $bg_color = imagecolorallocate($image, 0, 0, 0); // Black background
        $text_color = imagecolorallocate($image, 255, 255, 255); // White text
        $noise_color = imagecolorallocate($image, 100, 100, 100); // Gray noise
        
        // Fill background
        imagefill($image, 0, 0, $bg_color);
        
        // Add noise lines
        for ($i = 0; $i < 5; $i++) {
            imageline($image, 
                rand(0, $width), rand(0, $height),
                rand(0, $width), rand(0, $height),
                $noise_color
            );
        }
        
        // Add text
        $font_size = 5;
        $text_length = strlen($text);
        $letter_spacing = $width / ($text_length + 1);
        
        for ($i = 0; $i < $text_length; $i++) {
            $x = $letter_spacing * ($i + 1) - 8;
            $y = rand(8, $height - 20);
            
            imagestring($image, $font_size, $x, $y, $text[$i], $text_color);
        }
        
        // Add noise dots
        for ($i = 0; $i < 50; $i++) {
            imagesetpixel($image, rand(0, $width), rand(0, $height), $noise_color);
        }
        
        // Convert to PNG
        ob_start();
        imagepng($image);
        $imageData = ob_get_contents();
        ob_end_clean();
        
        imagedestroy($image);
        
        return $imageData;
    }
    
    public function verify(Request $request)
    {
        $userInput = strtolower($request->input('captcha'));
        $sessionCaptcha = strtolower(Session::get('captcha'));
        
        if ($userInput === $sessionCaptcha) {
            Session::forget('captcha');
            return response()->json(['success' => true, 'message' => 'CAPTCHA verified successfully']);
        }
        
        return response()->json(['success' => false, 'message' => 'Invalid CAPTCHA']);
    }
}