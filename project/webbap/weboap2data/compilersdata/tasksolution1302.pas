program massiv1;
 const n=3;
 var
 a:array[1..n] of integer;
 b:array[1..n,1..n] of integer;
 j,i:integer;
 begin
       for i:=1 to n do read(a[i]);
         for i:=1 to n do  for j:=1 to n do
       b[i,j] :=a[i] - (3*a[j]);
       for i:=1 to n do
       for j:=1 to n do write(b[i,j],' ');
end.
