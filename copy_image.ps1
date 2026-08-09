$src = "C:\Users\USER\.gemini\antigravity-ide\brain\0a894872-8dd5-4760-9de5-3c422fce3dad\media__1785745772680.png"
$dst1 = "c:\Users\USER\Desktop\New folder (3)\portrait.png"
$dst2 = "c:\Users\USER\Desktop\New folder (3)\public\portrait.png"
[System.IO.File]::Copy($src, $dst1, $true)
[System.IO.File]::Copy($src, $dst2, $true)

$src2 = "C:\Users\USER\.gemini\antigravity-ide\brain\66393ad0-3241-4b44-aa41-37d045bbc3ed\media__1786199185275.jpg"
$dst2_1 = "c:\Users\USER\Desktop\New folder (3)\migration_dashboard.png"
$dst2_2 = "c:\Users\USER\Desktop\New folder (3)\public\migration_dashboard.png"
[System.IO.File]::Copy($src2, $dst2_1, $true)
[System.IO.File]::Copy($src2, $dst2_2, $true)

$src3 = "C:\Users\USER\.gemini\antigravity-ide\brain\36fbce1a-62e5-41f8-87f6-5a0328be1598\media__1786258759419.png"
$dst3_1 = "c:\Users\USER\Desktop\New folder (3)\dpplan_dashboard.png"
$dst3_2 = "c:\Users\USER\Desktop\New folder (3)\public\dpplan_dashboard.png"
$dst3_3 = "c:\Users\USER\Desktop\New folder (3)\date_planner_dashboard.png"
$dst3_4 = "c:\Users\USER\Desktop\New folder (3)\public\date_planner_dashboard.png"
[System.IO.File]::Copy($src3, $dst3_1, $true)
[System.IO.File]::Copy($src3, $dst3_2, $true)
[System.IO.File]::Copy($src3, $dst3_3, $true)
[System.IO.File]::Copy($src3, $dst3_4, $true)

Write-Host "Images copied successfully!"
