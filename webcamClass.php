<?php
//require_once(dirname( __FILE__ ) . '/connectionClass.php');
class webcamClass{
    private $imageFolder="webcamImage/";
    
    //This function will create a new name for every image captured using the current data and time.
    private function getNameWithPath(){
        $name = $this->imageFolder.date('YmdHis').".jpg";
        return $name;
    }

    private function base64_to_jpeg( $base64_string, $output_file ) {
        $ifp = fopen( $output_file, "wb" ); 
        fwrite( $ifp, base64_decode( $base64_string) ); 
        fclose( $ifp ); 
        return( $output_file ); 
    }
    
    //function will get the image data and save it to the provided path with the name and save it to the database
    public function showImage(){
        //return base64_encode(file_get_contents('php://input'));
        $filename = 'requirement_' .date('m-d-Y_hisa');
        $filename = 'uploads/' . $filename . ".jpg";
        $parsed = base64_encode(file_get_contents('php://input'));
        $image = $this->base64_to_jpeg($parsed , $filename);
        return str_replace('uploads/', '', $filename);
    }
}