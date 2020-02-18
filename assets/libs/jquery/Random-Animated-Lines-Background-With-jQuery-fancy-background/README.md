# fancy-background
Fancy background lines animation jQuery Plugin

A fancy lines background animated. For free use, just give me credit!

## Download
Fancy background is easy to use, just download from Github.

## Usage
The plugin requires jQuery, just call it before fancy background script
```
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
```
And call Fancy Background (min included):
```
<script src="fancy-background.min.js"></script>
```
Now just activate in document ready:
```
<script>
  $(document).ready(function() {
    $('body').fancyBackground({
      minHeightPCT : 20,
      maxHeightPCT : 80,
      spaceGutter : 30,
      duration : 60,
      colors : ['#07579c', '#62285a', '#e9b908', '#43af46', '#ee3427', '#00928d']
    });
  });
</script>
```
## Options
You can change this options to modify the background:
- lines
  - (default: false) You can specify the amount of lines, this is false by default and the plugin calculate the number of lines
- lineWidth
  - (default: 10) The width size of the line in pixels
- minHeightPCT
  - (default: 40) The minimal height percentage for the line
- maxHeightPCT
  - (default: 80) The maximun height percentage for the line
- spaceGutter
  - (default: false) The space width between lines, if ```lines``` is false, this will be ignored
- duration
  - (default: 30) The duration in seconds of the animation per line
- colors
  - (default: null) Array with hexa code colors, the background colors for the lines will be random from this array
```
<script>
  $(document).ready(function() {
    $('body').fancyBackground({
      lines : false,
      lineWidth : 10,
      minHeightPCT : 40,
      maxHeightPCT : 80,
      spaceGutter : false,
      duration : 30,
      colors : ['#07579c', '#62285a', '#e9b908', '#43af46', '#ee3427', '#00928d']
    });
  });
</script>
```
## Demo
[http://flinbu.github.io/fancy-background/](http://flinbu.github.io/fancy-background/)
