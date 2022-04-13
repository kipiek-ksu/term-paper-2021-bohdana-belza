Program weboap07;
var
   M,N:real;
   T:byte;
begin
     read(M,N);
     T:=0;
     while M<=N do begin
           M:=1.2*M;
           T:=T+1
     end;
     write(T)
end.
