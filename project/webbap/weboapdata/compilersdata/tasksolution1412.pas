program L6_9;
var i,j,k,n,count:integer;
    summ,middle:real;
    a:array [1..50,1..9] of integer;
    temp:array [1..9] of real;
begin
     summ:=0;
     k:=0;
     count:=1;
     read(n);
     for i:=1 to n do
     for j:=1 to 9 do
     read(a[i,j]);
     for j:=1 to 9 do
          if j mod 2= 0 then
          begin
                  for i:=1 to n do
                  begin
                  summ:=summ+a[i,j];
                  k:=k+1;
                  end;

           middle:=summ/k;
           temp[count]:=middle;
           count:=count+1;
           k:=0;
           summ:=0;
        end;
     for j:=1 to count-2 do
     write(temp[j]:0:1,' ');
     write(temp[count-1]:0:1);
end.