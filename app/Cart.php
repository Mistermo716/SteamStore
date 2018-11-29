<?php

namespace App;

class Cart
{
    /**
     * @var CartItem[]
     */
    protected $items = [];

    /**
     * @return Cart
     */
    public static function make()
    {
        return session()->get('cart', new static);
    }

    /**
     * Add an item or quantity to an item in the cart.
     *
     * @param Game $game
     * @param int $quantity
     * @return $this
     */
    public function add(Game $game, $quantity = 1)
    {
        // Adjust old quantity if in the cart
        $item = $this->items[$game->slug] ?? new CartItem($game);

        $item->add($quantity);
        $this->items[$game->slug] = $item;

        return $this;
    }

    /**
     * Remove an item or reduce the quantity of an item.
     *
     * @param Game $game
     * @param null $quantity
     * @return $this
     */
    public function remove(Game $game, $quantity = null)
    {
        if ($item = array_get($this->items, $game->slug)) {
            if ($quantity && $item->quantity > $quantity) {
                $item->remove($quantity);
            } else {
                unset($this->items[$game->slug]);
            }
        }

        return $this;
    }

    /**
     * Get a specific item in the cart by slug.
     *
     * @param $game
     * @return mixed
     */
    public function get($game)
    {
        $game = is_string($game) ? $game : $game->slug;

        return array_get($this->items, $game);
    }

    /**
     * Gets the items in the cart.
     *
     * @return CartItem[]
     */
    public function items()
    {
        return $this->items;
    }

    /**
     * Saves the cart
     */
    public function save()
    {
        session()->put('cart', $this);
    }

    /**
     * Gets the number of items in the cart.
     *
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * Gets the subtotal of the cart.
     *
     * @return float|int
     */
    public function subtotal()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->price;
        }

        return $total;
    }

    /**
     * Get the total of the cart.
     *
     * @return float|int
     */
    public function total()
    {
        $subtotal = $this->subtotal();
        return $subtotal + ($subtotal * 0.0875);
    }
}
