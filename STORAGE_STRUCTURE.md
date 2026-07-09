# Ebook Assets Storage Structure

## Folder Organization

```
storage/app/public/
├── covers/                    # Main ebook cover images
│   ├── thumbnails/            # Smaller versions for grid view
│   └── README.md              # This file
├── illustrations/             # Chapter illustrations and artwork
│   └── README.md              # This file
├── audio/                      # Audio narration files
│   └── README.md              # This file
└── .gitkeep                   # Ensures folder is tracked in git
```

## Folder Details

### 📚 `covers/`
**Purpose:** Main ebook cover images (JPG, PNG, WebP)
**Recommended size:** 800x1200 pixels (3:4 aspect ratio)
**Thumbnail size:** 400x600 pixels
**Max file size:** 2MB per image

**Naming convention:**
```
{book_id}_{slug}.{extension}
Example: 1_kelinci-lucu-wortel.jpg
```

### 🎨 `illustrations/`
**Purpose:** Chapter-specific illustrations and artwork
**Recommended size:** 1200x800 pixels (3:2 aspect ratio)
**Max file size:** 1MB per image

**Naming convention:**
```
{book_id}_chapter_{chapter_number}_{slug}.{extension}
Example: 1_chapter_1_wortel-magic.jpg
```

### 🎵 `audio/`
**Purpose:** Audio narration for ebooks
**Format:** MP3, M4A, OGG
**Recommended bitrate:** 128kbps
**Max file size:** 10MB per file

**Naming convention:**
```
{book_id}_chapter_{chapter_number}_{slug}.{extension}
Example: 1_chapter_1_kelinci-narration.mp3
```

## Maintenance Guidelines

### Upload Process
1. Always use the naming conventions above
2. Compress images before uploading (use TinyPNG or similar)
3. Generate thumbnails for covers
4. Update database with correct file paths

### Recommended Tools
- **Image compression:** TinyPNG, Squoosh
- **Image resizing:** ImageMagick, Canva
- **Audio compression:** Audacity, FFmpeg

### Backup
- Always keep original high-resolution files
- Use cloud backup for large assets
- Track file versions in database

## Example Usage in Code

```php
// Get cover URL
$coverUrl = asset('storage/covers/' . $book->cover_image);

// Get thumbnail URL
$thumbnailUrl = asset('storage/covers/thumbnails/' . $book->thumbnail_image);

// Get chapter illustration
$illustrationUrl = asset('storage/illustrations/' . $illustration->filename);
```

## TODO
- [ ] Setup media library management
- [ ] Create image upload form
- [ ] Implement automatic thumbnail generation
- [ ] Setup CDN for static assets
