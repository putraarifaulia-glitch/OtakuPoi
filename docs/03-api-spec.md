# API Specification

> Dokumentasikan setiap endpoint yang dikembangkan maupun yang dikonsumsi dari layanan eksternal.
> Salin dan ulangi blok di bawah untuk setiap endpoint tambahan.

---

## [Nama Endpoint]

**Method:** `GET`

**URL:** `/api/v1/anime/search`

**Deskripsi:** `Mengambil daftar anime berdasarkan kata kunci (query) menggunakan endpoint v4/anime dari Jikan API.`

**Autentikasi Diperlukan:** `Tidak`

**Sumber:** `Third-Party API — Jikan API`

**Request Headers:**

```
Authorization: Bearer <token>
Content-Type: application/json
```

**Request Body:**

```json
-
```

**Response Sukses (`200 OK`):**

```json
{
    "status": "success",
    "data": [
        {
            "mal_id": 1,
            "title": "Cowboy Bebop",
            "episodes": 26,
            "score": 8.75
        }
    ]
}
```

**Response Gagal:**

```json
{
    "status": "error",
    "message": "Failed to fetch data from Jikan API"
}
```

---

## Contoh — Get Current Weather

**Method:** `GET`

**URL:** `/api/v1/anime/top`

**Deskripsi:** Mengambil daftar anime dengan peringkat tertinggi dari Jikan API.

**Autentikasi Diperlukan:** `Tidak`

**Sumber:** `Third-Party API — Jikan API`

**Request Headers:**

```
Authorization: Bearer <token>
Content-Type: application/json
```

**Request Body:** `-`

**Response Sukses (`200 OK`):**

```json
{
    "status": "success",
    "data": [
        {
            "rank": 1,
            "title": "Frieren: Beyond Journey's End",
            "score": 9.35
        }
    ]
}
```

**Response Gagal:**

```json
{
    "status": "error",
    "message": "Resource not found"
}
```

---

_(Salin blok template di atas untuk setiap endpoint selanjutnya)_
