package db;

import java.sql.ResultSet;
import java.sql.SQLException;

public class Bloque {
    private Integer idBloque;
    private Integer idDia;
    private String idSala;
    private String idSeccion;
    private String inicio;
    private String termino;
    private Integer bloqueSiguiente;
    public Bloque(Integer idBloque, Integer idDia, String idSala, String idSeccion, String inicio, String termino,
	    Integer bloqueSiguiente) {
	this.idBloque = idBloque;
	this.idDia = idDia;
	this.idSala = idSala;
	this.idSeccion = idSeccion;
	this.inicio = inicio;
	this.termino = termino;
	this.bloqueSiguiente = bloqueSiguiente;
    }

    public Bloque(ResultSet datos) {

	try {
	    this.idBloque = datos.getInt(1);
	    this.idDia = datos.getInt(2);
	    this.idSala = datos.getString(3);
	    this.idSeccion = datos.getString(4);
	    this.inicio = datos.getString(5);
	    this.termino = datos.getString(6);
	    this.bloqueSiguiente = datos.getInt(7);
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
    }
    /**
     * @return the idSala
     */
    public String getIdSala() {
	return idSala;
    }
    /**
     * @param idSala the idSala to set
     */
    public void setIdSala(String idSala) {
	this.idSala = idSala;
    }
    /**
     * @return the idSeccion
     */
    public String getIdSeccion() {
	return idSeccion;
    }
    /**
     * @param idSeccion the idSeccion to set
     */
    public void setIdSeccion(String idSeccion) {
	this.idSeccion = idSeccion;
    }
    /**
     * @return the bloqueSiguiente
     */
    public Integer getBloqueSiguiente() {
	return bloqueSiguiente;
    }
    /**
     * @param bloqueSiguiente the bloqueSiguiente to set
     */
    public void setBloqueSiguiente(Integer bloqueSiguiente) {
	this.bloqueSiguiente = bloqueSiguiente;
    }
    /**
     * @return the idBloque
     */
    public Integer getIdBloque() {
	return idBloque;
    }
    /**
     * @return the idDia
     */
    public Integer getIdDia() {
	return idDia;
    }
    /**
     * @return the inicio
     */
    public String getInicio() {
	return inicio;
    }
    /**
     * @return the termino
     */
    public String getTermino() {
	return termino;
    }
    /* (non-Javadoc)
     * @see java.lang.Object#toString()
     */
    @Override
    public String toString() {
	return "Bloque [idBloque=" + idBloque + "]";
    }
    /* (non-Javadoc)
     * @see java.lang.Object#hashCode()
     */
    @Override
    public int hashCode() {
	final int prime = 31;
	int result = 1;
	result = prime * result + ((idBloque == null) ? 0 : idBloque.hashCode());
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
	if (!(obj instanceof Bloque)) {
	    return false;
	}
	Bloque other = (Bloque) obj;
	if (idBloque == null) {
	    if (other.idBloque != null) {
		return false;
	    }
	} else if (!idBloque.equals(other.idBloque)) {
	    return false;
	}
	return true;
    }




}
