<div class="btn-group">
    <a href="javascript:void(0)" class="teachinfobutton btn-secondary btn" data-id="{{ $row }}">
        <svg class="filament-link-icon w-4 h-4 mr-1"
            style="width: 1.5em; height: 1.5em; vertical-align: middle; fill: currentColor; overflow: hidden;"
            viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <!-- SVG path for the first button -->
        </svg>
    </a>
    <a href="javascript:void(0)" class="btn btn-secondary teacheditbutton" data-id="{{ $row }}">
        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="24px" fill="#3C91E6">
            <!-- SVG path for the second button -->
        </svg>
    </a>
    <a href="javascript:void(0)" class="btn btn-secondary text-danger teachdelbutton" data-id="{{ $row }}">
        <svg xmlns="http://www.w3.org/2000/svg" height="20px" class="text-danger" viewBox="0 0 24 24" width="24px"
            fill="#F08080">
            <!-- SVG path for the third button -->
        </svg>
    </a>
</div>
