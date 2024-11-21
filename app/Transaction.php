<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    /**
     * Los atributos que son asignables en masa
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * El nombre de la fecha y hora actuales con la zona horaria específica
     *
     * @var constant
     */
    private const TIMEZONE = 'Asia/Jakarta';

    /**
     * Obtener el cliente que posee la transacción.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Los autos que pertenecen a la transacción.
     */
    public function cars()
    {
        return $this->belongsToMany(Car::class)
            ->withTimestamps();
    }

    /**
     * Obtener la fecha de inicio de la transacción con un formato personalizado
     *
     * @return mixed
     */
    public function getStartDateWithDayAttribute()
    {
        return transformDateFormat($this->start_date, 'l, j F Y H:i');
    }

    /**
     * Obtener la fecha de finalización de la transacción con un formato personalizado
     *
     * @return mixed
     */
    public function getFinishDateWithDayAttribute()
    {
        return transformDateFormat($this->finish_date, 'l, j F Y H:i');
    }

    /**
     * Obtener la fecha de retorno de la transacción con un formato personalizado
     *
     * @return mixed
     */
    public function getReturnDateWithDayAttribute()
    {
        return transformDateFormat($this->return_date, 'l, j F Y H:i');
    }

    /**
     * Obtener el estado de la transacción con condiciones
     *
     * @return bool
     */
    public function getTransactionStatusOnGoing()
    {
        return $this->finish_date > now(self::TIMEZONE);
    }

    /**
     * Obtener el estado de la transacción con condiciones
     *
     * @return bool
     */
    public function getTransactionStatusLate()
    {
        return $this->finish_date < now(self::TIMEZONE);
    }

    /**
     * Obtener el estado de la transacción con condiciones
     *
     * @return bool
     */
    public function getTransactionStatusCompleted()
    {
        return $this->status === 'COMPLETED';
    }

    /**
     * Obtener el estado de la transacción
     *
     * @return array
     */
    public function getTransactionStatusAttribute()
    {
        if ($this->getTransactionStatusCompleted()) return ['text-success', 'SELECCIONADO'];

        if ($this->getTransactionStatusOnGoing()) return ['text-primary', 'EN PROGRESO'];

        if ($this->getTransactionStatusLate()) return ['text-danger', 'TARDÍO'];
    }


    /**
     * Alcance para una consulta que solo incluya el estado de las transacciones.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTransactionStatus($query, $status)
    {
        if (in_array($status, ['>', '<']))
            return $query->where('finish_date', $status, now(self::TIMEZONE))
                ->where('status', 'DP');

        if ($status === 'COMPLETED') return $query->where('status', $status);
    }
}
