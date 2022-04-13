var i,j,N:integer;
    a:array[1..100,1..100] of real;
begin
     read(N);
     for i:=1 to N do
     begin
          for j:=1 to N do
          begin
               a[i,j]:=1/(i+j);
               write(a[i,j]:0:2,' ');
          end;
       
     end;
end.