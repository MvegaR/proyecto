package db;

public class Departamento {
    private Integer idDepartamento;
    private String nombreDepartamento;
    public Departamento(Integer idDepartamento, String nombreDepartamento) {
	this.idDepartamento = idDepartamento;
	this.nombreDepartamento = nombreDepartamento;
    }
    /* (non-Javadoc)
     * @see java.lang.Object#toString()
     */
    @Override
    public String toString() {
	return "Departamento [idDepartamento=" + idDepartamento + "]";
    }
    /* (non-Javadoc)
     * @see java.lang.Object#hashCode()
     */
    @Override
    public int hashCode() {
	final int prime = 31;
	int result = 1;
	result = prime * result + ((idDepartamento == null) ? 0 : idDepartamento.hashCode());
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
	if (!(obj instanceof Departamento)) {
	    return false;
	}
	Departamento other = (Departamento) obj;
	if (idDepartamento == null) {
	    if (other.idDepartamento != null) {
		return false;
	    }
	} else if (!idDepartamento.equals(other.idDepartamento)) {
	    return false;
	}
	return true;
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
    
    
    
    
    
    
}
