package db;

public class Docente {
    private String idDocente;
    private Integer idRol;
    private Integer idFacultad;
    private String nombreDocente;
    private String email;
    private String user;
    private String password;
    private String cookie;
    public Docente(String idDocente, Integer idRol, Integer idFacultad, String nombreDocente, String email, String user,
	    String password, String cookie) {
	
	this.idDocente = idDocente;
	this.idRol = idRol;
	this.idFacultad = idFacultad;
	this.nombreDocente = nombreDocente;
	this.email = email;
	this.user = user;
	this.password = password;
	this.cookie = cookie;
    }
    /* (non-Javadoc)
     * @see java.lang.Object#toString()
     */
    @Override
    public String toString() {
	return "Docente [idDocente=" + idDocente + "]";
    }
    /**
     * @return the idDocente
     */
    public String getIdDocente() {
        return idDocente;
    }
    /**
     * @return the idRol
     */
    public Integer getIdRol() {
        return idRol;
    }
    /**
     * @return the idFacultad
     */
    public Integer getIdFacultad() {
        return idFacultad;
    }
    /**
     * @return the nombreDocente
     */
    public String getNombreDocente() {
        return nombreDocente;
    }
    /**
     * @return the email
     */
    public String getEmail() {
        return email;
    }
    /**
     * @return the user
     */
    public String getUser() {
        return user;
    }
    /**
     * @return the password
     */
    public String getPassword() {
        return password;
    }
    /**
     * @return the cookie
     */
    public String getCookie() {
        return cookie;
    }
    /* (non-Javadoc)
     * @see java.lang.Object#hashCode()
     */
    @Override
    public int hashCode() {
	final int prime = 31;
	int result = 1;
	result = prime * result + ((idDocente == null) ? 0 : idDocente.hashCode());
	return result;
    }
    /* (non-Javadoc)
     * @see java.lang.Object#equals(java.lang.Object)
     */
    @Override
    public boolean equals(Object obj) {
	if (this == obj) {
	    return true;
	}
	if (obj == null) {
	    return false;
	}
	if (!(obj instanceof Docente)) {
	    return false;
	}
	Docente other = (Docente) obj;
	if (idDocente == null) {
	    if (other.idDocente != null) {
		return false;
	    }
	} else if (!idDocente.equals(other.idDocente)) {
	    return false;
	}
	return true;
    }
    
    
}
