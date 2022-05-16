<?php

// @formatter:off

/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models {
    /**
     * App\Models\Field
     *
     * @property int $id
     * @property string $field_name
     * @property int $cost
     * @property int $type_id
     * @method static \Illuminate\Database\Eloquent\Builder|Field newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Field newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Field query()
     * @method static \Illuminate\Database\Eloquent\Builder|Field whereCost($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Field whereFieldName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Field whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Field whereTypeId($value)
     */
    class Field extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\Type
     *
     * @property int $id
     * @property string $field_member
     * @method static \Illuminate\Database\Eloquent\Builder|Type newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Type newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Type query()
     * @method static \Illuminate\Database\Eloquent\Builder|Type whereFieldMember($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Type whereId($value)
     */
    class Type extends \Eloquent
    {
    }
}

namespace App\Models {
    /**
     * App\Models\User
     *
     * @property int $id
     * @property string $username
     * @property string $password
     * @property string $name
     * @property string $email
     * @property string $phone
     * @property \Illuminate\Support\Carbon|null $email_verified_at
     * @property string|null $avatar
     * @property string|null $remember_token
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @property-read int|null $notifications_count
     * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
     * @property-read int|null $tokens_count
     * @method static \Database\Factories\UserFactory factory(...$parameters)
     * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User query()
     * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
     */
    class User extends \Eloquent
    {
    }
}

