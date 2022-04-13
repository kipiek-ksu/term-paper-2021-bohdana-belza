program l9z13;
var x,y,i,j,n:longint;a:array[1..100] of char;s:string;

    procedure per(e,b,c:longint);
        var v:array[1..100] of char;i,j,g,k:longint;
              begin
              for i:=1 to 100 do begin
              v[i]:=a[i];end;
              i:=e;j:=b+1;g:=e;
              while ((i<=b)and(j<=c)) do
                    begin
                    if v[i]>v[j] then
                    begin
                    a[g]:=v[i];i:=i+1;g:=g+1;x:=x+1;
                    end else
                    begin
                    a[g]:=v[j];j:=j+1;g:=g+1;x:=x+1;
                    end;
                    end;
                    if j<=c then k:=j else if i<=b then k:=i;
                    for i:=g to c do
                    begin
                    a[i]:=v[k];k:=k+1;x:=x+1;
                    end;
                    y:=y+1;
                    for i:=1 to n do
write(a[i],' ');writeln;


              end;
    procedure del(e,b:longint);
          var r:longint;
              begin
                   if e<b then
                   begin
                   r:=(e+b) div 2;
                   del(e,r);
                   del(r+1,b);
                   per(e,r,b);
                   end;

              end;


Begin
readln(n);
readln(s);
for i:=1 to n do
a[i]:=s[i];
del(1,n);
writeln(x);
writeln(y);
for i:=1 to n do
write(a[i],' ');



End.