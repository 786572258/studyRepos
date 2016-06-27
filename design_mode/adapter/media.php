<?php

/**
 * 适配器+简单工厂
 */
interface MediaPlayer {
    function play($mediaType, $fileName);
}

class AudioPlayer implements MediaPlayer {
    public function play($mediaType, $fileName) {
        if ($mediaType == "mp3") {
            echo "Playing mp3 file. Name: $fileName<br>";
        } elseif ($mediaType == "mp4" || $mediaType == "vlc") {
            $mediaAdapter = new MediaAdapter();
            $mediaAdapter->play($mediaType, $fileName);
        } else {
            echo "Invalid media. $mediaType format not supported";
        }
    }
}

class AdvancedMediaPlayerFactory {
    public static function createAdvancedMediaPlayer($mediaType) {
        if ($mediaType == "mp4") {
            return new Mp4Player();
        } elseif ($mediaType == "vlc") {
            return new VlcPlayer();
        } else {
            throw new Exception("No Such $mediaType Player!");
        }
    }
}

interface AdvancedMediaPlayer {
    function playAdvancedMedia($fileName);
}

class Mp4Player implements AdvancedMediaPlayer {
    public function playAdvancedMedia($fileName) {
        echo "Playing mp4 file. Name: $fileName<br>";
    }
}

class VlcPlayer implements AdvancedMediaPlayer {
    public function playAdvancedMedia($fileName) {
        echo "Playing vlc file. Name: $fileName<br>";
    }
}

class MediaAdapter implements MediaPlayer {
    public function play($mediaType, $fileName) {
        $advancedMediaPlayer = AdvancedMediaPlayerFactory::createAdvancedMediaPlayer($mediaType);
        $advancedMediaPlayer->playAdvancedMedia($fileName);
    }
}

class Client {
    public static function main() {
        $audioPlayer = new AudioPlayer();
        $audioPlayer->play("mp3", "beyond the horizon.mp3");
        $audioPlayer->play("mp4", "lone.mp4");
        $audioPlayer->play("vlc", "far far away.vlc");
        $audioPlayer->play("avi", "mind me.avi");
    }
}

Client::main();