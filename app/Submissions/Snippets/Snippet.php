<?php namespace DarkShare\Submissions\Snippets;

use DarkShare\Contracts\Models\Protectable;
use DarkShare\Contracts\Models\Sluggable;
use DarkShare\Model;
use DarkShare\Submissions\Traits\HashPasswordTrait;
use DarkShare\Submissions\Traits\ProtectableTrait;
use DarkShare\Submissions\Traits\ProtectedFromBots;
use DarkShare\Submissions\Traits\RecordsActivity;
use DarkShare\Users\User;

class Snippet extends Model implements Protectable, Sluggable {

	use HashPasswordTrait;
	use ProtectableTrait;
	use RecordsActivity;
	use ProtectedFromBots;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'snippets';

	/**
	 * The hidden attributed that should not be shown
	 *
	 * @var array
	 */
	protected $hidden = ['password'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'title', 'body', 'mode', 'password'];

	/**
	 * Define the relationship between a snippet and a user
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function slug()
	{
		return $this->hasOne(SnippetSlug::class);
	}
}
