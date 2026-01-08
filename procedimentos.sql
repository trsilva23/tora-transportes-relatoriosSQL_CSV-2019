-- Executar no Oracle Database local
CREATE OR REPLACE PROCEDURE SP_GERAR_RELATORIO_TORA (
    p_inicio IN VARCHAR2,
    p_fim    IN VARCHAR2,
    p_modelo IN VARCHAR2,
    p_result OUT SYS_REFCURSOR
) AS
BEGIN
    OPEN p_result FOR
    SELECT 
        m.IDENTIDADE_FUNCIONAL AS MATRICULA,
        m.NOME_COMPLETO AS MOTORISTA,
        m.CPF,
        v.PLACA,
        v.CADASTRO_INTERNO,
        v.MODELO,
        r.KM_PERCORRIDA,
        (r.KM_PERCORRIDA * 0.45) AS CUSTO_ESTIMADO_COMBUSTIVEL
    FROM TB_VIAGENS r
    JOIN TB_VEICULOS v ON r.ID_VEICULO = v.ID
    -- Cruzamento entre bancos via DB Link
    JOIN COLABORADORES@DBLINK_RH m ON r.ID_MOTORISTA = m.ID
    WHERE r.DATA_SAIDA BETWEEN TO_DATE(p_inicio, 'YYYY-MM-DD') AND TO_DATE(p_fim, 'YYYY-MM-DD')
    AND (v.MODELO = p_modelo OR p_modelo IS NULL);
END;
/
