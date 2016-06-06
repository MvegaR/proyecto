package db;

public class Facultad {
    
    private Integer idFacultad;
    private Integer idDepartamento;
    private String nombreDepartamento;
    public Facultad(Integer idFacultad, Integer idDepartamento, String nombreDepartamento) {
	
	this.idFacultad = idFacultad;
	this.idDepartamento = idDepartamento;
	this.nombreDepartamento = nombreDepartamento;
    }
    /**
     * @return the idFacultad
     */
    public Integer getIdFacultad() {
        return idFacultad;
    }
    /**
     * @return the idDepartamento
     */
    public Integer getIdDepartamento() {
        return idDepartamento;
    }
    /**
     * @return the nombreDepartamento
     */
    public String getNombreDepartamento() {
        return nombreDepartamento;
    }
    /* (non-Javadoc)
     * @see java.lang.Object#toString()
     */
    @Override
    public String toString() {
	return "Facultad [idFacultad=" + idFacultad + "]";
    }
    /* (non-Javadoc)
     * @see java.lang.Object#hashCode()
     */
    @Override
    public int hashCode() {
	final int prime = 31;
	int result = 1;
	result = prime * result + ((idFacultad == null) ? 0 : idFacultad.hashCode());
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
	if (!(obj instanceof Facultad)) {
	    return false;
	}
	Facultad other = (Facultad) obj;
	if (idFacultad == null) {
	    if (other.idFacultad != null) {
		return false;
	    }
	} else if (!idFacultad.equals(other.idFacultad)) {
	    return false;
	}
	return true;
    }
    
    
    
    
    
    

}
