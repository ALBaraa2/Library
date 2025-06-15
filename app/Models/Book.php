<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Review;
use App\Models\BorrowedBooks;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_id',
        'publisher_id',
        'description',
        'genre',
        'quantity',
        'isbn',
        'publication_date',
        'language',
        'total_pages',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBooks::class, 'book_id');
    }

    public function scopeTitle(Builder $query, String $title): Builder
    {
        return $query->where('title', 'Like', '%' . $title . '%');
    }

    public function scopeWithReviewsCount(Builder $query, $from = null, $to = null): Builder | QueryBuilder
    {
        return $query->withCount([
            'reviews' => fn(Builder $q) => $this->dateRangeFilter($q, $from, $to)
        ]);
    }

    public function scopeWithAvgRating(Builder $query, $from = null, $to = null): Builder | QueryBuilder
    {
        return $query->withAvg([
            'reviews' => fn(Builder $q) => $this->dateRangeFilter($q, $from, $to)
        ], 'rating');
    }

    public function scopePopular(Builder $query, $from = null, $to = null): Builder | QueryBuilder
    {
        return $query->withReviewsCount()
        ->orderBy('reviews_count', 'desc');
    }

    public function scopeHighestRated(Builder $query,  $from = null, $to = null): Builder | QueryBuilder
    {
        return $query->withAvgRating()
        ->orderBy('reviews_avg_rating', 'desc');
    }

    public function scopeMinReviews(Builder $query, int $minReviews): Builder | QueryBuilder
    {
        return $query->having('reviews_count', '>=', $minReviews);
    }

    private function DateRangeFilter(Builder $query, $from = null, $to = null)
    {
        if ($from && !$to) {
            $query->where('created_at', '>=', $from);
        } elseif (!$from && $to) {
            $query->where('created_at', '<=', $to);
        } elseif ($from && $to) {
            $query->whereBetween('created_at', [$from, $to]);
        }

    }

    public function scopePopularLastMonth(Builder $query): Builder|QueryBuilder
    {
        return $query->popular(now()->subMonth(), now())
            ->highestRated(now()->subMonth(), now());
    }

    public function scopePopularLast6Months(Builder $query): Builder|QueryBuilder
    {
        return $query->popular(now()->subMonths(6), now())
            ->highestRated(now()->subMonths(6), now());
    }

    public function scopeHighestRatedLastMonth(Builder $query): Builder|QueryBuilder
    {
        return $query->highestRated(now()->subMonth(), now())
            ->popular(now()->subMonth(), now());
    }

    public function scopeHighestRatedLast6Months(Builder $query): Builder|QueryBuilder
    {
        return $query->highestRated(now()->subMonths(6), now())
            ->popular(now()->subMonths(6), now());
    }

    protected static function booted()
    {
        static::updated(
            fn() => cache()->flush()
        );
        static::deleted(
            fn() => cache()->flush()
        );
        static::created(
            fn() => cache()->flush()
        );
    }
}
