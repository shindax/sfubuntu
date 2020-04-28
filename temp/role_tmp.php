    /**
     * Return all product associated to the category.
     *
     * @return User[]
     */
    public function getUsers()
    {
        return $this->users;
    }

    public function setUsers(array $users): self
    {
        $this->users = $users;
        return $this;
    }


    /**
     * Add a user in the roles association.
     * (Owning side).
     *
     * @param $user User the category to associate
     */
    public function addUser($user)
    {
        if ($this->users->contains($user)) {
            return;
        }

        $this->users->add($user);
        $user->addRole($this);
    }

    /**
     * Remove a role in the user association.
     * (Owning side).
     *
     * @param $user User 
     */
    public function removeUser($user)
    {
        if (!$this->users->contains($user)) {
            return;
        }

        $this->users->removeElement($user);
        $user->removeRole($this);
    }
