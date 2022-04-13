program n1;
var a: array [1..3] of integer;
    b: array [1..3,1..3] of integer;
    i,j:integer;
begin
     read(a[1],a[2],a[3]);

     for i:=1 to 3 do
         for j:=1 to 3 do
             b[i,j]:=a[i]-3*a[j];
     for i:=1 to 3 do
         begin
              for j:=1 to 3 do
                  write(b[i,j],' ');
              
         end;


end.