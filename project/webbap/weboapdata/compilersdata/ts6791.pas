const
     n=4;
procedure tower (n:byte; init, aux,fin:char);
begin
     if n=1 then write (init, #26, fin, ' ') else begin
        tower (n-1, init, fin, aux );
        write (init, #26, fin, ' ');
        tower (n-1, aux, init, fin);
     end
end;

begin
     tower (n,'1','2','3'); 
end.
